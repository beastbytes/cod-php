<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Type\Extensions;

/**
 * Links to PHP Gui extensions documentation.
 *
 * @link https://www.php.net/manual/en/refs.ui.php
 */
enum Gui: string
{
    // UI
    case UI_Point = 'https://www.php.net/manual/{lang}/class.ui-point.php';
    case UI_Size = 'https://www.php.net/manual/{lang}/class.ui-size.php';
    case UI_Window = 'https://www.php.net/manual/{lang}/class.ui-window.php';
    case UI_Control = 'https://www.php.net/manual/{lang}/class.ui-control.php';
    case UI_Menu = 'https://www.php.net/manual/{lang}/class.ui-menu.php';
    case UI_MenuItem = 'https://www.php.net/manual/{lang}/class.ui-menuitem.php';
    case UI_Area = 'https://www.php.net/manual/{lang}/class.ui-area.php';
    case UI_Executor = 'https://www.php.net/manual/{lang}/class.ui-executor.php';
    case UI_Controls_Tab = 'https://www.php.net/manual/{lang}/class.ui-controls-tab.php';
    case UI_Controls_Check = 'https://www.php.net/manual/{lang}/class.ui-controls-check.php';
    case UI_Controls_Button = 'https://www.php.net/manual/{lang}/class.ui-controls-button.php';
    case UI_Controls_ColorButton = 'https://www.php.net/manual/{lang}/class.ui-controls-colorbutton.php';
    case UI_Controls_Label = 'https://www.php.net/manual/{lang}/class.ui-controls-label.php';
    case UI_Controls_Entry = 'https://www.php.net/manual/{lang}/class.ui-controls-entry.php';
    case UI_Controls_MultilineEntry = 'https://www.php.net/manual/{lang}/class.ui-controls-multilineentry.php';
    case UI_Controls_Spin = 'https://www.php.net/manual/{lang}/class.ui-controls-spin.php';
    case UI_Controls_Slider = 'https://www.php.net/manual/{lang}/class.ui-controls-slider.php';
    case UI_Controls_Progress = 'https://www.php.net/manual/{lang}/class.ui-controls-progress.php';
    case UI_Controls_Separator = 'https://www.php.net/manual/{lang}/class.ui-controls-separator.php';
    case UI_Controls_Combo = 'https://www.php.net/manual/{lang}/class.ui-controls-combo.php';
    case UI_Controls_EditableCombo = 'https://www.php.net/manual/{lang}/class.ui-controls-editablecombo.php';
    case UI_Controls_Radio = 'https://www.php.net/manual/{lang}/class.ui-controls-radio.php';
    case UI_Controls_Picker = 'https://www.php.net/manual/{lang}/class.ui-controls-picker.php';
    case UI_Controls_Form = 'https://www.php.net/manual/{lang}/class.ui-controls-form.php';
    case UI_Controls_Grid = 'https://www.php.net/manual/{lang}/class.ui-controls-grid.php';
    case UI_Controls_Group = 'https://www.php.net/manual/{lang}/class.ui-controls-group.php';
    case UI_Controls_Box = 'https://www.php.net/manual/{lang}/class.ui-controls-box.php';
    case UI_Draw_Pen = 'https://www.php.net/manual/{lang}/class.ui-draw-pen.php';
    case UI_Draw_Path = 'https://www.php.net/manual/{lang}/class.ui-draw-path.php';
    case UI_Draw_Matrix = 'https://www.php.net/manual/{lang}/class.ui-draw-matrix.php';
    case UI_Draw_Color = 'https://www.php.net/manual/{lang}/class.ui-draw-color.php';
    case UI_Draw_Stroke = 'https://www.php.net/manual/{lang}/class.ui-draw-stroke.php';
    case UI_Draw_Brush = 'https://www.php.net/manual/{lang}/class.ui-draw-brush.php';
    case UI_Draw_Brush_Gradient = 'https://www.php.net/manual/{lang}/class.ui-draw-brush-gradient.php';
    case UI_Draw_Brush_LinearGradient = 'https://www.php.net/manual/{lang}/class.ui-draw-brush-lineargradient.php';
    case UI_Draw_Brush_RadialGradient = 'https://www.php.net/manual/{lang}/class.ui-draw-brush-radialgradient.php';
    case UI_Draw_Text_Layout = 'https://www.php.net/manual/{lang}/class.ui-draw-text-layout.php';
    case UI_Draw_Text_Font = 'https://www.php.net/manual/{lang}/class.ui-draw-text-font.php';
    case UI_Draw_Text_Font_Descriptor = 'https://www.php.net/manual/{lang}/class.ui-draw-text-font-descriptor.php';
    case UI_Draw_Text_Font_Weight = 'https://www.php.net/manual/{lang}/class.ui-draw-text-font-weight.php';
    case UI_Draw_Text_Font_Italic = 'https://www.php.net/manual/{lang}/class.ui-draw-text-font-italic.php';
    case UI_Draw_Text_Font_Stretch = 'https://www.php.net/manual/{lang}/class.ui-draw-text-font-stretch.php';
    case UI_Draw_Line_Cap = 'https://www.php.net/manual/{lang}/class.ui-draw-line-cap.php';
    case UI_Draw_Line_Join = 'https://www.php.net/manual/{lang}/class.ui-draw-line-join.php';
    case UI_Key = 'https://www.php.net/manual/{lang}/class.ui-key.php';
    case UI_Exception_InvalidArgumentException = 'https://www.php.net/manual/{lang}/class.ui-exception-invalidargumentexception.php';
    case UI_Exception_RuntimeException = 'https://www.php.net/manual/{lang}/class.ui-exception-runtimeexception.php';
}