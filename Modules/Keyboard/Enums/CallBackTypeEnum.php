<?php

namespace Modules\Keyboard\Enums;

enum CallBackTypeEnum :string
{
    case SendMusic = "SendMusic";
    case ChangePage = "ChangePage";
    case CloseKeyboard = "CloseKeyboard";
    case NoAction = "NoAction";
}