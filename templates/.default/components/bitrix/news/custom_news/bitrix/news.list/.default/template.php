<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="barba-wrapper">
    <? if ($arParams["DISPLAY_TOP_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?><br />
    <? endif; ?>
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <div class="article-list" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

            <? $href = (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) ? $arItem["DETAIL_PAGE_URL"] : "#" ?>
            <a class="article-item article-list__item" href="<? echo $href; ?>"
               data-anim="anim-3">
                <div class="article-item__background">
                    <? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])): ?>
                        <img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" data-src="xxxHTMLLINKxxx0.39186223192351520.41491856731872767xxx" alt=""/>
                    <? endif ?>
                </div>
                <div class="article-item__wrapper">
                    <div class="article-item__title">
                        <? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]): ?>
                            <? echo $arItem["NAME"] ?>
                        <? endif; ?>
                    </div>
                    <div class="article-item__content">
                        <? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]): ?>
                            <? echo $arItem["PREVIEW_TEXT"]; ?>
                        <? endif; ?>
                    </div>
                </div>
            </a>
        </div>

    <? endforeach; ?>
    <? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <br /><?= $arResult["NAV_STRING"] ?>
    <? endif; ?>
</div>
