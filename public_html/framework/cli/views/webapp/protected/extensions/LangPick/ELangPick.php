<?php
Yii::import('zii.widgets.CPortlet');
/**
 * This is simple language picker
 * @author lowliet (lowliet.com)
 */
class ELangPick extends CPortlet
{
	public $lng = array();
	/**
	 * @var string picker type.
	 * Valid values are 'buttons', 'dropdown' and 'links'.
	 */
	public $pickerType = 'links';

	/**
	 * @var string buttons size.
	 * Valid values are 'mini', 'small' and 'large'.
	 */
	public $buttonsSize = 'mini';

	/**
	 * @var array list of languages to exclude from display list
	 */
	public $excludeFromList = array();

	/**
	 * @var string buttons color.
	 * Valid values are 'primary', 'info', 'success', 'warning', 'danger' and 'inverse'.
	 */
	public $buttonsColor = 'danger';

	/**
	 * @var string links separator.
	 * Used when $pickerType = links.
	 * HTML tags can be used, eg. <b>, <strong>, <i>
	 */
	public $linksSeparator = ' <b>|</b> ';

	/**
	 * @var string inline form style.
	 */
	public $formStyle = 'margin:0; border: none; padding: 0; width: auto;';

	/**
	 * Iterates through messages directories
	 * @return array list of avaible languages
	 */
	private static function getLanguages()
	{
		$translations = array();
		$dirs = new DirectoryIterator(Yii::app()->messages->basePath);
		foreach ($dirs as $dir)
			if ($dir->isDir() && !$dir->isDot())
				$translations[$dir->getFilename()] = $dir->getFilename();
		return in_array(Yii::app()->sourceLanguage, $translations) ? $translations : array_merge($translations, array(Yii::app()->sourceLanguage => Yii::app()->sourceLanguage));
	}

	/**
	 * renders CPortlet content
	 */
	protected function renderContent()
	{
		$trans01 = self::getLanguages();
		$translations = $this->lng;
		foreach($translations as $key=>$val){
			if (!isset($trans01[$key])) unset($translations[$key]);
		}
		foreach($trans01 as $key=>$val)
		{
			$translations[$key]=$val;
		}
		for ($i = 0; $i < count($this->excludeFromList); $i++)
			$this->excludeFromList[$i] = strtolower($this->excludeFromList[$i]);
		$translations = array_diff($translations, $this->excludeFromList);
		echo '<div id="languagePickerContainer">';
		switch ($this->pickerType)
		{
			case 'buttons':
				if (!isset(Yii::app()->components['bootstrap']))
					throw new CException('Cannot find Bootstrap component');

				$buttons = array();
				foreach ($translations as $trans)
					$buttons[] = array_merge($buttons, array('type'=>$this->buttonsColor, 'label'=>(isset($this->lng[$trans])?$this->lng[$trans]:strtoupper($trans)), 'active'=>Yii::app()->getLanguage() == $trans, 'buttonType'=>'submit', 'htmlOptions' => array('name'=>'languagePicker', 'value'=>$trans)));

				echo CHtml::form('', 'post', array('style'=>$this->formStyle));

				try
				{
					$this->widget('bootstrap.widgets.BootButtonGroup', array(
						'toggle' => 'radio',
						'size' => $this->buttonsSize,
						'buttons' => $buttons,
					));
				}
				catch (CException $e)
				{
					try
					{
						$this->widget('bootstrap.widgets.TbButtonGroup', array(
							'toggle' => 'radio',
							'size' => $this->buttonsSize,
							'buttons' => $buttons,
						));
					}
					catch (CException $e)
					{
						echo 'Cannot find Bootstrap...';
					}
				}
				echo CHtml::endForm();
				break;
			case 'dropdown':
				$translationsU = array();
				foreach ($translations as $k => $v)
					$translationsU[$k] = isset($this->lng[$v])?$this->lng[$v]:strtoupper($v);
				echo CHtml::form('', 'post', array('style'=>$this->formStyle));
				echo CHtml::dropDownList('languagePicker' , Yii::app()->getLanguage(), $translationsU, array('submit'=>'', 'csrf'=>true));
				echo CHtml::endForm();
				break;
			case 'links':
				foreach ($translations as $trans)
					echo CHtml::link(isset($this->lng[$trans])?$this->lng[$trans]:strtoupper($trans), Yii::app()->homeUrl, array('class'=>(Yii::app()->getLanguage() == $trans ? 'active' : 'inactive'), 'submit'=>'', 'params'=>array('languagePicker'=>$trans))) . ($trans === end($translations) ? '' : $this->linksSeparator);
				break;
			case 'images':
				foreach ($translations as $trans)
				{
					$flagfile="flags/".(strtolower($trans)).".png";
					if (file_exists($flagfile))
					{
						echo CHtml::link("<img width=23 height=18 src='/flags/".strtolower($trans).".png' alt='".(isset($this->lng[$trans])?$this->lng[$trans]:strtoupper($trans))."' title='".(isset($this->lng[$trans])?$this->lng[$trans]:strtoupper($trans))."'>", Yii::app()->homeUrl, array('class'=>(Yii::app()->getLanguage() == $trans ? 'active' : 'inactive'), 'submit'=>'', 'params'=>array('languagePicker'=>$trans))) . ($trans === end($translations) ? '' : $this->linksSeparator);
					}
					else
						echo CHtml::link("<img width=23 height=18 src='/flags/unknown.png'  alt='".(isset($this->lng[$trans])?$this->lng[$trans]:strtoupper($trans))."' title='".(isset($this->lng[$trans])?$this->lng[$trans]:strtoupper($trans))."'>", Yii::app()->homeUrl, array('class'=>(Yii::app()->getLanguage() == $trans ? 'active' : 'inactive'), 'submit'=>'', 'params'=>array('languagePicker'=>$trans))) . ($trans === end($translations) ? '' : $this->linksSeparator);
				}
				break;
		}
		echo '</div>';
	}

	/**
	 * sets the language and saves to cookie
	 * @param $daysExpires integer number of days which cookie will last
	 */
	public static function setLanguage($daysExpires = 100)
	{
		if (Yii::app()->request->getPost('languagePicker') !== null && in_array($_POST['languagePicker'], self::getLanguages(), true))
		{
			Yii::app()->setLanguage($_POST['languagePicker']);
			$cookie = new CHttpCookie('language', $_POST['languagePicker']);
			$cookie->expire = time() + 60 * 60 * 24 * $daysExpires;
			Yii::app()->request->cookies['language'] = $cookie;
		}
		else if (isset(Yii::app()->request->cookies['language']) && in_array(Yii::app()->request->cookies['language']->value, self::getLanguages(), true))
		{
			Yii::app()->setLanguage(Yii::app()->request->cookies['language']->value);
		}
		else if (isset(Yii::app()->request->cookies['language']))
		{
			unset(Yii::app()->request->cookies['language']);
		}
		else
		{
			$preferredLang = explode('_', Yii::app()->getRequest()->getPreferredLanguage());
			if (in_array($preferredLang[0], self::getLanguages(), true))
				Yii::app()->setLanguage($preferredLang[0]);
		}
	}
}
?>