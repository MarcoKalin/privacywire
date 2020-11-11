<?php namespace ProcessWire;
/**
 * @var PrivacyWire $module Instance of the PrivacyWire module;
 */

$showAllButton = (in_array("all", $module->cookie_groups));
$showNecessaryButton = (in_array("necessary", $module->cookie_groups));
$showAllInsteadToggle = $module->content_banner_button_all_instead_toggle;
$showFunctionalButton = (in_array("functional", $module->cookie_groups));
$showStatisticsButton = (in_array("statistics", $module->cookie_groups));
$showMarketingButton = (in_array("marketing", $module->cookie_groups));
$showExternalMediaButton = (in_array("external_media", $module->cookie_groups));

$showChooseButton = (
    $showFunctionalButton ||
    $showStatisticsButton ||
    $showMarketingButton ||
    $showExternalMediaButton
);

// Multi Language Support
if ($this->wire('languages')) {
    $userLanguage = $this->wire('user')->language;
    $lang = $userLanguage->isDefault() ? '' : "__$userLanguage->id";
} else {
    $lang = '';
}

// Detailed Text for options banner 
if ($module->content_banner_details_show == true) {
    $optionsTitle = $module->get("content_banner_details_title$lang|content_banner_details_title");
    $optionsText = $module->get("content_banner_details_text$lang|content_banner_details_text");
} else {
    $optionsTitle = $module->get("content_banner_title$lang|content_banner_title");
    $optionsText = $module->get("content_banner_text$lang|content_banner_text");
}

$privacyPage = (!empty($module->get("content_banner_privacy_link$lang|content_banner_privacy_link"))) ? $module->get("content_banner_privacy_link$lang|content_banner_privacy_link") : null;

$imprintPage = (!empty($module->get("content_banner_imprint_link$lang|content_banner_imprint_link"))) ? $module->get("content_banner_imprint_link$lang|content_banner_imprint_link") : null;
?>

<div class="privacywire-wrapper">
    <div class="privacywire-page-wrapper">
        <div class="privacywire privacywire-banner">
            <?php if (!empty($module->content_banner_title)) {
               echo "<{$module->banner_header_tag} class='privacywire-header'>{$module->get("content_banner_title$lang|content_banner_title")}</{$module->banner_header_tag}>";
            }?>
            <div class="privacywire-body">
                <div class="privacywire-text"><?php echo $module->get("content_banner_text$lang|content_banner_text"); ?></div>
                <div class="privacywire-buttons">
                    <button class="allow-all" <?php echo (!$showAllButton) ? "hidden" : ""; ?>><?php echo $module->get("content_banner_button_allow_all$lang|content_banner_button_allow_all"); ?></button>
                    <button class="allow-necessary" <?php echo (!$showNecessaryButton) ? "hidden" : ""; ?>><?php echo $module->get("content_banner_button_allow_necessary$lang|content_banner_button_allow_necessary"); ?></button>

                    <button class="choose" <?php echo (!$showChooseButton) ? "hidden" : ""; ?>><?php echo $module->get("content_banner_button_choose$lang|content_banner_button_choose"); ?></button>
                </div>
                <?php if (!empty($privacyPage)): ?>
                    <a class="privacywire-page-link" href="<?php echo $privacyPage; ?>"
                       title="<?php echo $module->get("content_banner_privacy_title$lang|content_banner_privacy_title"); ?>"><?php echo $module->get("content_banner_privacy_title$lang|content_banner_privacy_title"); ?></a>
                <?php endif; ?>
                <?php if (!empty($imprintPage)): ?>
                    <a class="privacywire-page-link" href="<?php echo $imprintPage; ?>"
                       title="<?php echo $module->get("content_banner_imprint_title$lang|content_banner_imprint_title"); ?>"><?php echo $module->get("content_banner_imprint_title$lang|content_banner_imprint_title"); ?></a>
                <?php endif; ?>
            </div>

        </div>
        <div class="privacywire privacywire-options">
            <?php if (!empty($optionsTitle)) {
                echo "<{$module->banner_header_tag} class='privacywire-header'>{$optionsTitle}</{$module->banner_header_tag}>";
            }?>
            <div class="privacywire-body">
                <div class="privacywire-text"><?php echo $optionsText; ?></div>
                <div class="privacywire-text">
                    <ul>
                        <li <?php echo (!$showNecessaryButton) ? "hidden" : ""; ?>>
                            <label for="necessary">
                                <input class="required"
                                       type="checkbox"
                                       name="necessary"
                                       id="necessary"
                                       value="1"
                                       checked
                                       disabled>
                                <?php echo $module->get("cookies_necessary_label$lang|cookies_necessary_label"); ?>
                            </label>
                        </li>

                        <li <?php echo (!$showFunctionalButton) ? "hidden" : ""; ?>>
                            <label for="functional">
                                <input class="optional"
                                       type="checkbox"
                                       name="functional"
                                       id="functional"
                                       value="0">
                                <?php echo $module->get("cookies_functional_label$lang|cookies_functional_label"); ?>
                            </label>
                        </li>

                        <li <?php echo (!$showStatisticsButton) ? "hidden" : ""; ?>>
                            <label for="statistics">
                                <input class="optional"
                                       type="checkbox"
                                       name="statistics"
                                       id="statistics"
                                       value="0">
                                <?php echo $module->get("cookies_statistics_label$lang|cookies_statistics_label"); ?>
                            </label>
                        </li>

                        <li <?php echo (!$showMarketingButton) ? "hidden" : ""; ?>>
                            <label for="marketing">
                                <input class="optional"
                                       type="checkbox"
                                       name="marketing"
                                       id="marketing"
                                       value="0">
                                <?php echo $module->get("cookies_marketing_label$lang|cookies_marketing_label"); ?>
                            </label>
                        </li>

                        <li <?php echo (!$showExternalMediaButton) ? "hidden" : ""; ?>>
                            <label for="external_media">
                                <input class="optional"
                                       type="checkbox"
                                       name="external_media"
                                       id="external_media"
                                       value="0">
                                <?php echo $module->get("cookies_external_media_label$lang|cookies_external_media_label"); ?>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="privacywire-buttons">
                    <button class="allow-all" <?php echo ($showAllInsteadToggle) ? "" : "hidden"; ?>><?php echo $module->get("content_banner_button_allow_all$lang|content_banner_button_allow_all"); ?></button>
                    <button class="toggle" <?php echo ($showAllInsteadToggle) ? "hidden" : ""; ?>><?php echo $module->get("content_banner_button_toggle$lang|content_banner_button_toggle"); ?></button>
                    <button class="save"><?php echo $module->get("content_banner_button_save$lang|content_banner_button_save"); ?></button>
                </div>
                <?php if (!empty($privacyPage)): ?>
                    <a class="privacywire-page-link" href="<?php echo $privacyPage; ?>"
                       title="<?php echo $module->get("content_banner_privacy_title$lang|content_banner_privacy_title"); ?>"><?php echo $module->get("content_banner_privacy_title$lang|content_banner_privacy_title"); ?></a>
                <?php endif; ?>
                <?php if (!empty($imprintPage)): ?>
                    <a class="privacywire-page-link" href="<?php echo $imprintPage; ?>"
                       title="<?php echo $module->get("content_banner_imprint_title$lang|content_banner_imprint_title"); ?>"><?php echo $module->get("content_banner_imprint_title$lang|content_banner_imprint_title"); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="privacywire privacywire-message">
            <div class="privacywire-body"><?php echo $module->get("content_banner_save_message$lang|content_banner_save_message"); ?></div>
        </div>
    </div>
</div>
<div hidden class="privacywire-ask-consent-blueprint"><div class="privacywire-consent-message"><?php echo $module->get("ask_consent_message$lang|ask_consent_message"); ?></div><button class="privacywire-consent-button" data-consent-category="{categoryname}"><?php echo $module->get("ask_content_button_label$lang|ask_content_button_label"); ?></button></div>
