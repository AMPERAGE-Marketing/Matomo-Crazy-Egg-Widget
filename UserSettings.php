<?php
/**
 * Matomo - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */

namespace Piwik\Plugins\CrazyEggWidgetByAmperage;

use Piwik\Settings\Setting;
use Piwik\Settings\FieldConfig;

/**
 * Defines Settings for CrazyEggWidgetByAmperage.
 *
 * Usage like this:
 * $settings = new UserSettings();
 * $settings->autoRefresh->getValue();
 * $settings->color->getValue();
 */
class UserSettings extends \Piwik\Settings\Plugin\UserSettings
{
    /** @var Setting */
    public $crazyEggAPIKey;

    /** @var Setting */
    public $crazyEggSecretKey;

    protected function init()
    {
        $this->crazyEggAPIKey = $this->createCrazyEggAPIKey();
        $this->crazyEggSecretKey = $this->createCrazyEggSecretKey();
    }

    private function createCrazyEggAPIKey()
    {
        return $this->makeSetting('crazyEggAPIKey', $default = '', FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'API Key';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->uiControlAttributes = array('size' => 3);
            $field->description = 'The `API Key` Crazy Egg provides on http://app.crazyegg.com/v2/options/api';
        });
    }

    private function createCrazyEggSecretKey()
    {
        return $this->makeSetting('crazyEggSecretKey', $default = '', FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'API Secret';
            $field->uiControl = FieldConfig::UI_CONTROL_PASSWORD;
            $field->uiControlAttributes = array('size' => 3);
            $field->description = 'The `API Secret` Crazy Egg provides on http://app.crazyegg.com/v2/options/api';
        });
    }

}
