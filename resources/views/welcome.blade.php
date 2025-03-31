<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width,initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta name="theme-color" content="#234556">
    <meta http-equiv="Content-Language" content="vi" />
    <meta content="VN" name="geo.region" />
    <meta name="DC.language" scheme="utf-8" content="vi" />
    <meta name="language" content="Việt Nam">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('uploads/logo/' . $info->logo) }}"type="image/x-icon" />
    <meta name="revisit-after" content="1 days" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <title>{{ $meta_title }}</title>
    <meta name="description" content="{{ $meta_description }}" />
    <link rel="canonical" href="{{ Request::url() }}">
    <link rel="next" href="" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description"content="{{ $meta_description }}" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:site_name" content="{{ $meta_title }}" />
    <meta property="og:image" content="" />
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="55" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href="{{ asset('css/16.d89b8987.chunk.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.54afe0c0.chunk.css') }}" rel="stylesheet">
    <script>
        window.__APP_VERSION__ = "6d8a12a5e";
        window.__APP_VERSION_FILE__ = "version.json"
    </script>
    <style type="text/css">
        .transform-component-module_wrapper__7HFJe {
            position: relative;
            width: -moz-fit-content;
            width: fit-content;
            height: -moz-fit-content;
            height: fit-content;
            overflow: hidden;
            -webkit-touch-callout: none;
            /* iOS Safari */
            -webkit-user-select: none;
            /* Safari */
            -khtml-user-select: none;
            /* Konqueror HTML */
            -moz-user-select: none;
            /* Firefox */
            -ms-user-select: none;
            /* Internet Explorer/Edge */
            user-select: none;
            margin: 0;
            padding: 0;
        }

        #navbar-desktop-screen li a:hover {
            color: rgb(87, 183, 87);
            /* Màu chữ khi rê chuột vào */
        }

        .bWkxWx .btn-router-book {
            background-color: rgb(0, 119, 187);
            border-radius: 10px;
            animation: 1s ease 0s infinite normal none running hrOyWM;
            font-size: 16px;
            padding: 8px 16px;
        }

        body .cursor {
            cursor: pointer;
        }

        .menu {
            display: flex;
            flex-direction: column;
            padding: 0;
        }

        .menu li {
            flex: 1;
            /* Để mỗi thẻ li có chiều cao bằng nhau */
            display: flex;
            align-items: center;
        }

        .menu li a {
            /* Canh giữa nội dung của thẻ a */
            display: inline-block;
            width: 100%;
            text-align: center;
        }

        .transform-component-module_content__uCDPE {
            display: flex;
            flex-wrap: wrap;
            width: -moz-fit-content;
            width: fit-content;
            height: -moz-fit-content;
            height: fit-content;
            margin: 0;
            padding: 0;
            transform-origin: 0% 0%;
        }

        .transform-component-module_content__uCDPE img {
            pointer-events: none;
        }
    </style>
    <style id="react-mathquill-styles">
        /*
       * MathQuill v0.11.0, by Han, Jeanine, and Mary
       * http://mathquill.com | maintainers@mathquill.com
       *
       * This Source Code Form is subject to the terms of the
       * Mozilla Public License, v. 2.0. If a copy of the MPL
       * was not distributed with this file, You can obtain
       * one at http://mozilla.org/MPL/2.0/.
       */
        @font-face {
            /* Heavy fonts have been removed */
            font-family: Symbola;
        }

        .mq-editable-field {
            display: -moz-inline-box;
            display: inline-block;
        }

        .mq-editable-field .mq-cursor {
            border-left: 1px solid black;
            margin-left: -1px;
            position: relative;
            z-index: 1;
            padding: 0;
            display: -moz-inline-box;
            display: inline-block;
        }

        .mq-editable-field .mq-cursor.mq-blink {
            visibility: hidden;
        }

        .mq-editable-field,
        .mq-math-mode .mq-editable-field {
            border: 1px solid gray;
        }

        .mq-editable-field.mq-focused,
        .mq-math-mode .mq-editable-field.mq-focused {
            -webkit-box-shadow: #8bd 0 0 1px 2px, inset #6ae 0 0 2px 0;
            -moz-box-shadow: #8bd 0 0 1px 2px, inset #6ae 0 0 2px 0;
            box-shadow: #8bd 0 0 1px 2px, inset #6ae 0 0 2px 0;
            border-color: #709AC0;
            border-radius: 1px;
        }

        .mq-math-mode .mq-editable-field {
            margin: 1px;
        }

        .mq-editable-field .mq-latex-command-input {
            color: inherit;
            font-family: "Courier New", monospace;
            border: 1px solid gray;
            padding-right: 1px;
            margin-right: 1px;
            margin-left: 2px;
        }

        .mq-editable-field .mq-latex-command-input.mq-empty {
            background: transparent;
        }

        .mq-editable-field .mq-latex-command-input.mq-hasCursor {
            border-color: ActiveBorder;
        }

        .mq-editable-field.mq-empty:after,
        .mq-editable-field.mq-text-mode:after,
        .mq-math-mode .mq-empty:after {
            visibility: hidden;
            content: 'c';
        }

        .mq-editable-field .mq-cursor:only-child:after,
        .mq-editable-field .mq-textarea+.mq-cursor:last-child:after {
            visibility: hidden;
            content: 'c';
        }

        .mq-editable-field .mq-text-mode .mq-cursor:only-child:after {
            content: '';
        }

        .mq-editable-field.mq-text-mode {
            overflow-x: auto;
            overflow-y: hidden;
        }

        .mq-root-block,
        .mq-math-mode .mq-root-block {
            display: -moz-inline-box;
            display: inline-block;
            width: 100%;
            padding: 2px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            white-space: nowrap;
            overflow: hidden;
            vertical-align: middle;
        }

        .mq-math-mode {
            font-variant: normal;
            font-weight: normal;
            font-style: normal;
            font-size: 115%;
            line-height: 1;
            display: -moz-inline-box;
            display: inline-block;
        }

        .mq-math-mode .mq-non-leaf,
        .mq-math-mode .mq-scaled {
            display: -moz-inline-box;
            display: inline-block;
        }

        .mq-math-mode var,
        .mq-math-mode .mq-text-mode,
        .mq-math-mode .mq-nonSymbola {
            font-family: "Times New Roman", Symbola, serif;
            line-height: 0.9;
        }

        .mq-math-mode * {
            font-size: inherit;
            line-height: inherit;
            margin: 0;
            padding: 0;
            border-color: black;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            box-sizing: border-box;
        }

        .mq-math-mode .mq-empty {
            background: #ccc;
        }

        .mq-math-mode .mq-empty.mq-root-block {
            background: transparent;
        }

        .mq-math-mode.mq-empty {
            background: transparent;
        }

        .mq-math-mode .mq-text-mode {
            display: inline-block;
            white-space: pre;
        }

        .mq-math-mode .mq-text-mode.mq-hasCursor {
            box-shadow: inset darkgray 0 0.1em 0.2em;
            padding: 0 0.1em;
            margin: 0 -0.1em;
            min-width: 1ex;
        }

        .mq-math-mode .mq-font {
            font: 1em "Times New Roman", Symbola, serif;
        }

        .mq-math-mode .mq-font * {
            font-family: inherit;
            font-style: inherit;
        }

        .mq-math-mode b,
        .mq-math-mode b.mq-font {
            font-weight: bolder;
        }

        .mq-math-mode var,
        .mq-math-mode i,
        .mq-math-mode i.mq-font {
            font-style: italic;
        }

        .mq-math-mode var.mq-f {
            margin-right: 0.2em;
            margin-left: 0.1em;
        }

        .mq-math-mode .mq-roman var.mq-f {
            margin: 0;
        }

        .mq-math-mode big {
            font-size: 200%;
        }

        .mq-math-mode .mq-int>big {
            display: inline-block;
            -webkit-transform: scaleX(0.7);
            -moz-transform: scaleX(0.7);
            -ms-transform: scaleX(0.7);
            -o-transform: scaleX(0.7);
            transform: scaleX(0.7);
            vertical-align: -0.16em;
        }

        .mq-math-mode .mq-int>.mq-supsub {
            font-size: 80%;
            vertical-align: -1.1em;
            padding-right: 0.2em;
        }

        .mq-math-mode .mq-int>.mq-supsub>.mq-sup>.mq-sup-inner {
            vertical-align: 1.3em;
        }

        .mq-math-mode .mq-int>.mq-supsub>.mq-sub {
            margin-left: -0.35em;
        }

        .mq-math-mode .mq-roman {
            font-style: normal;
        }

        .mq-math-mode .mq-sans-serif {
            font-family: sans-serif, Symbola, serif;
        }

        .mq-math-mode .mq-monospace {
            font-family: monospace, Symbola, serif;
        }

        .mq-math-mode .mq-overline {
            border-top: 1px solid black;
            margin-top: 1px;
        }

        .mq-math-mode .mq-underline {
            border-bottom: 1px solid black;
            margin-bottom: 1px;
        }

        .mq-math-mode .mq-binary-operator {
            padding: 0 0.2em;
            display: -moz-inline-box;
            display: inline-block;
        }

        .mq-math-mode .mq-supsub {
            text-align: left;
            font-size: 90%;
            vertical-align: -0.5em;
        }

        .mq-math-mode .mq-supsub.mq-sup-only {
            vertical-align: 0.5em;
        }

        .mq-math-mode .mq-supsub.mq-sup-only .mq-sup {
            display: inline-block;
            vertical-align: text-bottom;
        }

        .mq-math-mode .mq-supsub .mq-sup {
            display: block;
        }

        .mq-math-mode .mq-supsub .mq-sub {
            display: block;
            float: left;
        }

        .mq-math-mode .mq-supsub .mq-binary-operator {
            padding: 0 0.1em;
        }

        .mq-math-mode .mq-supsub .mq-fraction {
            font-size: 70%;
        }

        .mq-math-mode sup.mq-nthroot {
            font-size: 80%;
            vertical-align: 0.8em;
            margin-right: -0.6em;
            margin-left: 0.2em;
            min-width: 0.5em;
        }

        .mq-math-mode .mq-paren {
            padding: 0 0.1em;
            vertical-align: top;
            -webkit-transform-origin: center 0.06em;
            -moz-transform-origin: center 0.06em;
            -ms-transform-origin: center 0.06em;
            -o-transform-origin: center 0.06em;
            transform-origin: center 0.06em;
        }

        .mq-math-mode .mq-paren.mq-ghost {
            color: silver;
        }

        .mq-math-mode .mq-paren+span {
            margin-top: 0.1em;
            margin-bottom: 0.1em;
        }

        .mq-math-mode .mq-array {
            vertical-align: middle;
            text-align: center;
        }

        .mq-math-mode .mq-array>span {
            display: block;
        }

        .mq-math-mode .mq-operator-name {
            font-family: Symbola, "Times New Roman", serif;
            line-height: 0.9;
            font-style: normal;
        }

        .mq-math-mode var.mq-operator-name.mq-first {
            padding-left: 0.2em;
        }

        .mq-math-mode var.mq-operator-name.mq-last,
        .mq-math-mode .mq-supsub.mq-after-operator-name {
            padding-right: 0.2em;
        }

        .mq-math-mode .mq-fraction {
            font-size: 90%;
            text-align: center;
            vertical-align: -0.4em;
            padding: 0 0.2em;
        }

        .mq-math-mode .mq-fraction,
        .mq-math-mode .mq-large-operator,
        .mq-math-mode x:-moz-any-link {
            display: -moz-groupbox;
        }

        .mq-math-mode .mq-fraction,
        .mq-math-mode .mq-large-operator,
        .mq-math-mode x:-moz-any-link,
        .mq-math-mode x:default {
            display: inline-block;
        }

        .mq-math-mode .mq-numerator,
        .mq-math-mode .mq-denominator,
        .mq-math-mode .mq-dot-recurring {
            display: block;
        }

        .mq-math-mode .mq-numerator {
            padding: 0 0.1em;
        }

        .mq-math-mode .mq-denominator {
            border-top: 1px solid;
            float: right;
            width: 100%;
            padding: 0.1em;
        }

        .mq-math-mode .mq-dot-recurring {
            text-align: center;
            height: 0.3em;
        }

        .mq-math-mode .mq-sqrt-prefix {
            padding-top: 0;
            position: relative;
            top: 0.1em;
            vertical-align: top;
            -webkit-transform-origin: top;
            -moz-transform-origin: top;
            -ms-transform-origin: top;
            -o-transform-origin: top;
            transform-origin: top;
        }

        .mq-math-mode .mq-sqrt-stem {
            border-top: 1px solid;
            margin-top: 1px;
            padding-left: 0.15em;
            padding-right: 0.2em;
            margin-right: 0.1em;
            padding-top: 1px;
        }

        .mq-math-mode .mq-diacritic-above {
            display: block;
            text-align: center;
            line-height: 0.4em;
        }

        .mq-math-mode .mq-diacritic-stem {
            display: block;
            text-align: center;
        }

        .mq-math-mode .mq-hat-prefix {
            display: block;
            text-align: center;
            line-height: 0.95em;
            margin-bottom: -0.7em;
            transform: scaleX(1.5);
            -moz-transform: scaleX(1.5);
            -o-transform: scaleX(1.5);
            -webkit-transform: scaleX(1.5);
        }

        .mq-math-mode .mq-hat-stem {
            display: block;
        }

        .mq-math-mode .mq-large-operator {
            vertical-align: -0.2em;
            padding: 0.2em;
            text-align: center;
        }

        .mq-math-mode .mq-large-operator .mq-from,
        .mq-math-mode .mq-large-operator big,
        .mq-math-mode .mq-large-operator .mq-to {
            display: block;
        }

        .mq-math-mode .mq-large-operator .mq-from,
        .mq-math-mode .mq-large-operator .mq-to {
            font-size: 80%;
        }

        .mq-math-mode .mq-large-operator .mq-from {
            float: right;
            /* take out of normal flow to manipulate baseline */
            width: 100%;
        }

        .mq-math-mode,
        .mq-math-mode .mq-editable-field {
            cursor: text;
            font-family: Symbola, "Times New Roman", serif;
        }

        .mq-math-mode .mq-overarc {
            border-top: 1px solid black;
            -webkit-border-top-right-radius: 50% 0.3em;
            -moz-border-radius-topright: 50% 0.3em;
            border-top-right-radius: 50% 0.3em;
            -webkit-border-top-left-radius: 50% 0.3em;
            -moz-border-radius-topleft: 50% 0.3em;
            border-top-left-radius: 50% 0.3em;
            margin-top: 1px;
            padding-top: 0.15em;
        }

        .mq-math-mode .mq-overarrow {
            min-width: 0.5em;
            border-top: 1px solid black;
            margin-top: 1px;
            padding-top: 0.2em;
            text-align: center;
        }

        .mq-math-mode .mq-overarrow:before {
            display: block;
            position: relative;
            top: -0.34em;
            font-size: 0.5em;
            line-height: 0em;
            content: '\27A4';
            text-align: right;
        }

        .mq-math-mode .mq-overarrow.mq-arrow-left:before {
            -moz-transform: scaleX(-1);
            -o-transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
            filter: FlipH;
            -ms-filter: "FlipH";
        }

        .mq-math-mode .mq-overarrow.mq-arrow-both {
            vertical-align: text-bottom;
        }

        .mq-math-mode .mq-overarrow.mq-arrow-both.mq-empty {
            min-height: 1.23em;
        }

        .mq-math-mode .mq-overarrow.mq-arrow-both.mq-empty:after {
            top: -0.34em;
        }

        .mq-math-mode .mq-overarrow.mq-arrow-both:before {
            -moz-transform: scaleX(-1);
            -o-transform: scaleX(-1);
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
            filter: FlipH;
            -ms-filter: "FlipH";
        }

        .mq-math-mode .mq-overarrow.mq-arrow-both:after {
            display: block;
            position: relative;
            top: -2.3em;
            font-size: 0.5em;
            line-height: 0em;
            content: '\27A4';
            visibility: visible;
            text-align: right;
        }

        .mq-math-mode .mq-selection,
        .mq-editable-field .mq-selection,
        .mq-math-mode .mq-selection .mq-non-leaf,
        .mq-editable-field .mq-selection .mq-non-leaf,
        .mq-math-mode .mq-selection .mq-scaled,
        .mq-editable-field .mq-selection .mq-scaled {
            background: #B4D5FE !important;
            background: Highlight !important;
            color: HighlightText;
            border-color: HighlightText;
        }

        .mq-math-mode .mq-selection .mq-matrixed,
        .mq-editable-field .mq-selection .mq-matrixed {
            background: #39F !important;
        }

        .mq-math-mode .mq-selection .mq-matrixed-container,
        .mq-editable-field .mq-selection .mq-matrixed-container {
            filter: progid:DXImageTransform.Microsoft.Chroma(color='#3399FF') !important;
        }

        .mq-math-mode .mq-selection.mq-blur,
        .mq-editable-field .mq-selection.mq-blur,
        .mq-math-mode .mq-selection.mq-blur .mq-non-leaf,
        .mq-editable-field .mq-selection.mq-blur .mq-non-leaf,
        .mq-math-mode .mq-selection.mq-blur .mq-scaled,
        .mq-editable-field .mq-selection.mq-blur .mq-scaled,
        .mq-math-mode .mq-selection.mq-blur .mq-matrixed,
        .mq-editable-field .mq-selection.mq-blur .mq-matrixed {
            background: #D4D4D4 !important;
            color: black;
            border-color: black;
        }

        .mq-math-mode .mq-selection.mq-blur .mq-matrixed-container,
        .mq-editable-field .mq-selection.mq-blur .mq-matrixed-container {
            filter: progid:DXImageTransform.Microsoft.Chroma(color='#D4D4D4') !important;
        }

        .mq-editable-field .mq-textarea,
        .mq-math-mode .mq-textarea {
            position: relative;
            -webkit-user-select: text;
            -moz-user-select: text;
            user-select: text;
        }

        .mq-editable-field .mq-textarea *,
        .mq-math-mode .mq-textarea *,
        .mq-editable-field .mq-selectable,
        .mq-math-mode .mq-selectable {
            -webkit-user-select: text;
            -moz-user-select: text;
            user-select: text;
            position: absolute;
            clip: rect(1em 1em 1em 1em);
            -webkit-transform: scale(0);
            -moz-transform: scale(0);
            -ms-transform: scale(0);
            -o-transform: scale(0);
            transform: scale(0);
            resize: none;
            width: 1px;
            height: 1px;
            box-sizing: content-box;
        }

        .mq-math-mode .mq-matrixed {
            background: white;
            display: -moz-inline-box;
            display: inline-block;
        }

        .mq-math-mode .mq-matrixed-container {
            filter: progid:DXImageTransform.Microsoft.Chroma(color='white');
            margin-top: -0.1em;
        }
    </style>
    <style type="text/css">
        .stf__parent {
            position: relative;
            display: block;
            box-sizing: border-box;
            transform: translateZ(0);

            -ms-touch-action: pan-y;
            touch-action: pan-y;
        }

        .sft__wrapper {
            position: relative;
            width: 100%;
            box-sizing: border-box;
        }

        .stf__parent canvas {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
        }

        .stf__block {
            position: absolute;
            width: 100%;
            height: 100%;
            box-sizing: border-box;
            perspective: 2000px;
        }

        .stf__item {
            display: none;
            position: absolute;
            transform-style: preserve-3d;
        }

        .stf__outerShadow {
            position: absolute;
            left: 0;
            top: 0;
        }

        .stf__innerShadow {
            position: absolute;
            left: 0;
            top: 0;
        }

        .stf__hardShadow {
            position: absolute;
            left: 0;
            top: 0;
        }

        .stf__hardInnerShadow {
            position: absolute;
            left: 0;
            top: 0;
        }
    </style>
    <style data-styled="active" data-styled-version="5.3.11"></style>
    <script charset="utf-8" src="/static/js/18.8804091f.chunk.js"></script>
    <title>Hoc10 - Bám sát chương trình GDPT mới 2018</title>
    <link rel="canonical" href="/" data-rh="true">
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1"
        data-rh="true">
    <meta name="keywords" content="" data-rh="true">
    <meta name="description"
        content="Truy cập Hoc10 ngay để đọc trọn bộ sách giáo khoa Cánh Diều và những tài liệu học tập, giảng dạy hữu ích."
        data-rh="true">
    <meta name="image" content="https://hoc10.monkeyuni.net/E_Learning/thumb/thumb_hoc10_2022.png" data-rh="true">
    <meta property="og:locale" content="vi-VN" data-rh="true">
    <meta property="og:type" content="website" data-rh="true">
    <meta property="og:title" content="Hoc10 - Bám sát chương trình GDPT mới 2018" data-rh="true">
    <meta property="og:description"
        content="Truy cập Hoc10 ngay để đọc trọn bộ sách giáo khoa Cánh Diều và những tài liệu học tập, giảng dạy hữu ích."
        data-rh="true">
    <meta property="og:url" content="/" data-rh="true">
    <meta property="og:site_name" content="Hoc10" data-rh="true">
    <meta property="og:image" content="https://hoc10.monkeyuni.net/E_Learning/thumb/thumb_hoc10_2022.png"
        data-rh="true">
    <meta property="og:image:secure_url" content="https://hoc10.monkeyuni.net/E_Learning/thumb/thumb_hoc10_2022.png"
        data-rh="true">
    <meta property="og:image:width" content="1200" data-rh="true">
    <meta property="og:image:height" content="630" data-rh="true">
    <meta name="twitter:site" content="/" data-rh="true">
    <meta name="twitter:card" content="summary_large_image" data-rh="true">
    <meta name="twitter:title" content="Hoc10 - Bám sát chương trình GDPT mới 2018" data-rh="true">
    <meta name="twitter:description"
        content="Truy cập Hoc10 ngay để đọc trọn bộ sách giáo khoa Cánh Diều và những tài liệu học tập, giảng dạy hữu ích."
        data-rh="true">
    <meta name="twitter:image" content="https://hoc10.monkeyuni.net/E_Learning/thumb/thumb_hoc10_2022.png"
        data-rh="true">
    <meta property="fb:app_id" content="402736724816484" data-rh="true">
    <script type="application/ld+json" data-rh="true">{
                "@context": "https://schema.org",
                "@graph": [
                    {
                      "@type": "Organization",
                              "@id": "https://hoc10.vn/#organization",
                              "url": "https://hoc10.vn/",
                              "sameAs": [
                                "https://www.facebook.com/Hoc10-H%E1%BB%8Dc-1-bi%E1%BA%BFt-10-106859728447188/",
                                "https://www.youtube.com/channel/UCtmc2xq9J4n2_kuOAue7dCQ"
                              ],
                              "name": "Hoc10",
                              "logo": [
                                        {
                                          "@type": "ImageObject",
                                          "@id": "https://hoc10.vn/#logo",
                                          "inLanguage": "vi-VN",
                                          "url": "https://hoc10.vn/assets/img/updated_logo.png",
                                          "width": 610,
                                          "height": 134,
                                          "caption": "Hoc10"
                                        }
                                      ],
                              "foundingDate": "2003",
                              "slogan": "Hoc10 - Bám sát chương trình GDPT mới 2018",
                              "legalName": "Hoc10",
                              "founder": {
                                          "@type": "Person",
                                          "name": "Hoc10",
                                          "url": "https://hoc10.vn/ve-chung-toi/",
                                          "sameAs": "https://hoc10.vn/ve-chung-toi/"
                                          },
                              "numberOfEmployees": {
                                          "@type": "QuantitativeValue",
                                          "value": 30
                                          }
                      },
                    {
                      "@type": "WebSite",
                              "@id": "https://hoc10.vn/#website",
                              "url": "https://hoc10.vn/",
                              "name": "Hoc10 - Bám sát chương trình GDPT mới 2018",
                              "description": "Hoc10 mang sứ mệnh xây dựng hệ sinh thái giáo dục, kết nối nhà trường, học sinh và phụ huynh, tạo môi trường dạy và học hiệu quả",
                              "publisher": {
                                          "@id": "https://hoc10.vn/#organization"
                                          },
                              "copyrightHolder": {
                                          "@id": "https://hoc10.vn/#organization"
                                          }
                    }
                          ]
                  }</script>
    <style type="text/css"
        data-fbcssmodules="css:fb.css.base css:fb.css.dialog css:fb.css.iframewidget css:fb.css.customer_chat_plugin_iframe">
        .fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset>div {
            overflow: hidden
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset>div {
            overflow: hidden
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_dialog {
            background: rgba(82, 82, 82, .7);
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_dialog_advanced {
            border-radius: 8px;
            padding: 10px
        }

        .fb_dialog_content {
            background: #fff;
            color: #373737
        }

        .fb_dialog_close_icon {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;
            cursor: pointer;
            display: block;
            height: 15px;
            position: absolute;
            right: 18px;
            top: 17px;
            width: 15px
        }

        .fb_dialog_mobile .fb_dialog_close_icon {
            left: 5px;
            right: auto;
            top: 5px
        }

        .fb_dialog_padding {
            background-color: transparent;
            position: absolute;
            width: 1px;
            z-index: -1
        }

        .fb_dialog_close_icon:hover {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent
        }

        .fb_dialog_close_icon:active {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent
        }

        .fb_dialog_iframe {
            line-height: 0
        }

        .fb_dialog_content .dialog_title {
            background: #6d84b4;
            border: 1px solid #365899;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            margin: 0
        }

        .fb_dialog_content .dialog_title>span {
            background: url(https://connect.facebook.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;
            float: left;
            padding: 5px 0 7px 26px
        }

        body.fb_hidden {
            height: 100%;
            left: 0;
            margin: 0;
            overflow: visible;
            position: absolute;
            top: -10000px;
            transform: none;
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading {
            background: url(https://connect.facebook.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;
            min-height: 100%;
            min-width: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 10001
        }

        .fb_dialog.fb_dialog_mobile.loading.centered {
            background: none;
            height: auto;
            min-height: initial;
            min-width: initial;
            width: auto
        }

        .fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner {
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content {
            background: none
        }

        .loading.centered #fb_dialog_loader_close {
            clear: both;
            color: #fff;
            display: block;
            font-size: 18px;
            padding-top: 20px
        }

        #fb-root #fb_dialog_ipad_overlay {
            background: rgba(0, 0, 0, .4);
            bottom: 0;
            left: 0;
            min-height: 100%;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 10000
        }

        #fb-root #fb_dialog_ipad_overlay.hidden {
            display: none
        }

        .fb_dialog.fb_dialog_mobile.loading iframe {
            visibility: hidden
        }

        .fb_dialog_mobile .fb_dialog_iframe {
            position: sticky;
            top: 0
        }

        .fb_dialog_content .dialog_header {
            background: linear-gradient(from(#738aba), to(#2c4987));
            border-bottom: 1px solid;
            border-color: #043b87;
            box-shadow: white 0 1px 1px -1px inset;
            color: #fff;
            font: bold 14px Helvetica, sans-serif;
            text-overflow: ellipsis;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0;
            vertical-align: middle;
            white-space: nowrap
        }

        .fb_dialog_content .dialog_header table {
            height: 43px;
            width: 100%
        }

        .fb_dialog_content .dialog_header td.header_left {
            font-size: 12px;
            padding-left: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .dialog_header td.header_right {
            font-size: 12px;
            padding-right: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .touchable_button {
            background: linear-gradient(from(#4267B2), to(#2a4887));
            background-clip: padding-box;
            border: 1px solid #29487d;
            border-radius: 3px;
            display: inline-block;
            line-height: 18px;
            margin-top: 3px;
            max-width: 85px;
            padding: 4px 12px;
            position: relative
        }

        .fb_dialog_content .dialog_header .touchable_button input {
            background: none;
            border: none;
            color: #fff;
            font: bold 12px Helvetica, sans-serif;
            margin: 2px -12px;
            padding: 2px 6px 3px 6px;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
        }

        .fb_dialog_content .dialog_header .header_center {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            text-align: center;
            vertical-align: middle
        }

        .fb_dialog_content .dialog_content {
            background: url(https://connect.facebook.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;
            border: 1px solid #4a4a4a;
            border-bottom: 0;
            border-top: 0;
            height: 150px
        }

        .fb_dialog_content .dialog_footer {
            background: #f5f6f7;
            border: 1px solid #4a4a4a;
            border-top-color: #ccc;
            height: 40px
        }

        #fb_dialog_loader_close {
            float: left
        }

        .fb_dialog.fb_dialog_mobile .fb_dialog_close_icon {
            visibility: hidden
        }

        #fb_dialog_loader_spinner {
            animation: rotateSpinner 1.2s linear infinite;
            background-color: transparent;
            background-image: url(https://connect.facebook.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);
            background-position: 50% 50%;
            background-repeat: no-repeat;
            height: 24px;
            width: 24px
        }

        @keyframes rotateSpinner {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        .fb_iframe_widget {
            display: inline-block;
            position: relative
        }

        .fb_iframe_widget span {
            display: inline-block;
            position: relative;
            text-align: justify
        }

        .fb_iframe_widget iframe {
            position: absolute
        }

        .fb_iframe_widget_fluid_desktop,
        .fb_iframe_widget_fluid_desktop span,
        .fb_iframe_widget_fluid_desktop iframe {
            max-width: 100%
        }

        .fb_iframe_widget_fluid_desktop iframe {
            min-width: 220px;
            position: relative
        }

        .fb_iframe_widget_lift {
            z-index: 1
        }

        .fb_iframe_widget_fluid {
            display: inline
        }

        .fb_iframe_widget_fluid span {
            width: 100%
        }

        .fb_mpn_mobile_landing_page_slide_out {
            animation-duration: 200ms;
            animation-name: fb_mpn_landing_page_slide_out;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_landing_page_slide_out_from_left {
            animation-duration: 200ms;
            animation-name: fb_mpn_landing_page_slide_out_from_left;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_landing_page_slide_up {
            animation-duration: 500ms;
            animation-name: fb_mpn_landing_page_slide_up;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_in {
            animation-duration: 300ms;
            animation-name: fb_mpn_bounce_in;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_out {
            animation-duration: 300ms;
            animation-name: fb_mpn_bounce_out;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_out_v2 {
            animation-duration: 300ms;
            animation-name: fb_mpn_fade_out;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_in_v2 {
            animation-duration: 300ms;
            animation-name: fb_bounce_in_v2;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_in_from_left {
            animation-duration: 300ms;
            animation-name: fb_bounce_in_from_left;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_out_v2 {
            animation-duration: 300ms;
            animation-name: fb_bounce_out_v2;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_out_from_left {
            animation-duration: 300ms;
            animation-name: fb_bounce_out_from_left;
            transition-timing-function: ease-in
        }

        .fb_invisible_flow {
            display: inherit;
            height: 0;
            overflow-x: hidden;
            width: 0
        }

        @keyframes fb_mpn_landing_page_slide_out {
            0% {
                margin: 0 12px;
                width: 100% - 24px
            }

            60% {
                border-radius: 18px
            }

            100% {
                border-radius: 50%;
                margin: 0 24px;
                width: 60px
            }
        }

        @keyframes fb_mpn_landing_page_slide_out_from_left {
            0% {
                left: 12px;
                width: 100% - 24px
            }

            60% {
                border-radius: 18px
            }

            100% {
                border-radius: 50%;
                left: 12px;
                width: 60px
            }
        }

        @keyframes fb_mpn_landing_page_slide_up {
            0% {
                bottom: 0;
                opacity: 0
            }

            100% {
                bottom: 24px;
                opacity: 1
            }
        }

        ul {
            display: flex;
            justify-content: space-between;
            /* Để cách đều các item */
            list-style-type: none;
            padding: 0;
        }

        li {
            flex: 1;
            /* Tự động phân chia đều chiều rộng cho mỗi item */
            text-align: center;
            /* Căn giữa nội dung của mỗi item */
        }


        @keyframes fb_mpn_bounce_in {
            0% {
                opacity: .5;
                top: 100%
            }

            100% {
                opacity: 1;
                top: 0
            }
        }

        @keyframes fb_mpn_fade_out {
            0% {
                bottom: 30px;
                opacity: 1
            }

            100% {
                bottom: 0;
                opacity: 0
            }
        }

        @keyframes fb_mpn_bounce_out {
            0% {
                opacity: 1;
                top: 0
            }

            100% {
                opacity: .5;
                top: 100%
            }
        }

        @keyframes fb_bounce_in_v2 {
            0% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom right
            }

            50% {
                transform: scale(1.03, 1.03);
                transform-origin: bottom right
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom right
            }
        }

        @keyframes fb_bounce_in_from_left {
            0% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom left
            }

            50% {
                transform: scale(1.03, 1.03);
                transform-origin: bottom left
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom left
            }
        }

        @keyframes fb_bounce_out_v2 {
            0% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom right
            }

            100% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom right
            }
        }

        @keyframes fb_bounce_out_from_left {
            0% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom left
            }

            100% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom left
            }
        }

        @keyframes slideInFromBottom {
            0% {
                opacity: .1;
                transform: translateY(100%)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes slideInFromBottomDelay {
            0% {
                opacity: 0;
                transform: translateY(100%)
            }

            97% {
                opacity: 0;
                transform: translateY(100%)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }

        /* Đảm bảo các phần tử trong .navbar được căn chỉnh */


        .logo {
            flex: 1;
        }

        /* Căn chỉnh form tìm kiếm */
        .form-timkiem {
            flex: 2;
            /* Điều chỉnh kích thước form tìm kiếm */
        }

        .input-group {
            display: flex;
            width: 100%;
        }

        .form-control {
            flex: 1;
            /* Đảm bảo input chiếm toàn bộ không gian trống */
            border-radius: 25px 0 0 25px;
            /* Bo tròn cạnh trái */
            border: 1px solid #ddd;
            /* Đường viền nhạt */
            padding: 10px 15px;
            /* Khoảng cách bên trong */
        }

        /* Căn chỉnh nút tìm kiếm */
        .search-btn {
            border-radius: 0 25px 25px 0;
            /* Bo tròn cạnh phải */
            border: 1px solid #007bff;
            /* Đường viền màu xanh lam */
            background-color: #007bff;
            /* Màu nền xanh lam */
            color: white;
            /* Màu chữ trắng */
            padding: 10px 15px;
            /* Khoảng cách bên trong */
            cursor: pointer;
            /* Con trỏ chuột dạng pointer */
            transition: background-color 0.3s ease;
            /* Hiệu ứng chuyển màu nền */
        }

        /* Thêm hiệu ứng hover cho nút tìm kiếm */
        .search-btn:hover {
            background-color: #0056b3;
            /* Màu nền đậm hơn khi hover */
        }

        /* Đảm bảo .navbar-collapse sử dụng Flexbox */
        /* Căn chỉnh các phần tử trong #navbar-desktop-screen */
        #navbar-desktop-screen {
            display: flex;
            justify-content: space-around;
            /* Căn giữa và cách đều các mục menu */
            align-items: center;
            /* Căn giữa các mục menu theo chiều dọc */
            list-style: none;
            /* Loại bỏ dấu chấm của danh sách */
            padding: 0;
            /* Loại bỏ khoảng trống mặc định của danh sách */
            margin: 0;
            /* Loại bỏ khoảng trống mặc định của danh sách */
        }

        /* Đảm bảo li của menu không có khoảng cách mặc định */


        /* Kiểu cho các liên kết trong menu */
        #navbar-desktop-screen li a {
            color: black;
            /* Màu chữ mặc định */
            text-decoration: none;
            /* Bỏ gạch chân mặc định */
            padding: 10px;
            /* Khoảng cách bên trong các liên kết */
            display: block;
            /* Đảm bảo padding hoạt động chính xác */
        }

        /* Màu chữ khi rê chuột vào */
        #navbar-desktop-screen li a:hover {
            color: red;
        }

        /* Màu chữ cho trang hiện tại */
        #navbar-desktop-screen li a.active {
            color: green;
        }

        /* Đảm bảo .login sử dụng flexbox */
        .login {
            display: flex;
            align-items: center;
            gap: 10px;
            /* Khoảng cách giữa các nút đăng ký và đăng nhập */
        }

        /* Căn chỉnh các liên kết đăng ký và đăng nhập */
    </style>
</head>

<body><noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-WJZQ93L" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <div id="root">
        <div>
            <div class="Toastify"></div>
            <header>
                <nav class="navbar navbar-expand-lg">
                    <div class="container pr"><a class="logo width-logo" href="{{ route('homepage') }}"><img
                                src="{{ asset('uploads/logo/' . $info->logo) }}" class=""
                                alt="Logo hoc tap"></a><button class="navbar-toggler border-0 "
                            type="button"><span></span></button>
                        <div class="form-group form-timkiem">
                            <div class="input-group col-xs-12">
                                <form action="{{ route('tim-kiem') }}" method="GET" class="d-flex">
                                    <input id="timkiem" type="text" name="search" class="form-control"
                                        placeholder="Tìm kiếm..." autocomplete="off" required>
                                    <button class="btn btn-primary">Tìm kiếm</button>
                                </form>
                            </div>
                        </div>
                        <div class="navbar-collapse" id="navbar">
                            <ul class="sc-bdlOLf eOyewn navbar-nav" id="navbar-desktop-screen">
                                <li><a title="Giới thiệu" href="#">Giới thiệu</a>
                                </li>


                                <li><a title="Chuyên đề lớp" href="/gioi-thieu/">Tủ Sách</a>
                                    <ul class="sub-menu bg-sh">
                                        @foreach ($genre_home as $key => $gen)
                                            <li><a title="{{ $gen->title }}"
                                                    href="{{ route('genre', $gen->slug) }}">{{ $gen->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul><span class="show-menu"></span>
                                </li>

                                <li><a class="position-relative mr-3 false" title="Tài Liệu Nâng Cao"
                                        href="/gioi-thieu/">Đề Kiểm Tra</a>
                                    <ul class="sub-menu bg-sh">
                                        @foreach ($country_home as $key => $cout)
                                            <li><a title="{{ $cout->title }}"
                                                    href="{{ route('country', $cout->slug) }}">{{ $cout->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul><span class="show-menu"></span>
                                </li>
                                @foreach ($category_home as $key => $cate)
                                    <li class="position-relative mr-3 false"><a title="{{ $cate->title }}"
                                            href="{{ route('category', $cate->slug) }}">{{ $cate->title }}</a></li>
                                @endforeach
                            </ul>
                            <div class="login m-hidden">
                                <div class="login__before flex-lc">
                                    <a href="{{ route('login-by-gg') }}">
                                        <div title="Đăng nhập" class="btn_register btn-pr flex-center">Đăng nhập</div>
                                    </a>
                                </div>
                            </div>
                        </div>

                </nav>
                <div class="box-fix-right"></div>
            </header>
        </div>
    </div>

    <div class="container">
        <div class="row fullwith-slider"></div>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <div class="clearfix"></div>
    <footer>
        <div class="container footer">
            <br>
            <div class="logo-white"><a href="/"><img width="30%"
                        src="{{ asset('uploads/logo/' . $info->logo) }}" alt="Logo Hoc10"></a>
            </div>
            <div class="middle flex pr">
                <div class="col col1">
                    <h3>VỀ Learn Smart</h3>
                    <ul class="menu">
                        <li><a href="/bo-sgk-canh-dieu/">Bộ sách <span>Cánh Diều</span></a></li>
                        <li><a href="/Kết nối tri thức với cuộc sống/">Kết nối tri thức với cuộc sống</a></li>
                        <li><a href="/Chân trời sáng tạo/">Chân trời sáng tạo</a></li>
                        <li><a href="/Liên hệ/">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col col2">
                    <div class="col-group">
                        <h3>GIÁO VIÊN</h3>
                        <ul class="menu">
                            <li><a href="/tu-sach/?block=1&amp;grade=4&amp;subject=32">Sách giáo viên</a></li>
                            <li><a href="/bai-giang/">Bài giảng</a></li>
                        </ul>
                    </div>
                    <div class="col-group">
                        <h3>HỌC SINH</h3>
                        <ul class="menu">
                            <li><a href="/tu-sach/">Tủ sách</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col3">
                    <div class="col-group">
                        <h3>HỖ TRỢ</h3>
                        <ul class="menu">
                            <li>
                                <div class="sc-kNecGe fXqoHy">Kích hoạt sách</div>
                            </li>
                            <li><a href="/cau-hoi-thuong-gap/">Câu hỏi thường gặp</a></li>
                            <li><a href="/danh-sach-don-vi-phat-hanh/">Địa chỉ mua sách</a></li>
                            <li><a href="/cau-hoi-thuong-gap/?q=huong-dan-kiem-tra-sach-that">Hướng dẫn kiểm tra
                                    sách thật</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col4">
                    <div class="service">
                        <p>Hotline &amp; Dịch Vụ Khách Hàng</p>
                        <div class="flex box-btn"><a href="tel:0339778436"><i class="icon icon-phone"></i>
                                0339778436
                            </a><a href="mailto:learnsmart@gmail.com"><i class="icon icon-mail"></i>
                                learnsmart@gmail.com</a></div><span>8h00 - 21h30 các ngày trong tuần</span>
                    </div>
                    <div class="social">
                        <p>Kết nối với <span>Hoc learn smart</span></p>
                        <div class="social__list flex"><a
                                href="https://www.facebook.com/Hoc10-H%E1%BB%8Dc-1-bi%E1%BA%BFt-10-106859728447188/"
                                target="_blank" title="" class="facebook flex-center"><img
                                    src="/assets/img/icon-facebook.svg" alt="Logo facebook"></a><a
                                href="https://www.youtube.com/channel/UCtmc2xq9J4n2_kuOAue7dCQ" target="_blank"
                                title="" class="youtube flex-center"><img src="/assets/img/icon-youtube.svg"
                                    alt="Logo youtube"></a></div>
                    </div>
                    <div class="fs-ftr"><a
                            href="//www.dmca.com/Protection/Status.aspx?ID=5d7dee04-b7ca-4a0a-9e06-f0daaab3093a"
                            title="DMCA.com Protection Status" class="dmca-badge fs-ftr-dmca"> <img
                                src="https://images.dmca.com/Badges/dmca_protected_16_120.png?ID=5d7dee04-b7ca-4a0a-9e06-f0daaab3093a"
                                alt="DMCA.com Protection Status"></a>
                        <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"></script><a
                            href="http://online.gov.vn/Home/WebDetails/86940?AspxAutoDetectCookieSupport=1"
                            target="_blank" style="margin-left: 15px;"> <img
                                src="https://hoc10.monkeyuni.net/E_Learning/thumb/bocongthuong.png"
                                alt="bo-cong-thuong"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div class="container flex">
                <div class="copyright">© 2024 - website học tập</div>
            </div>
        </div>
    </footer>
    <div class="col-xs-12 col-sm-4 col-md-12">
        <p style="text-align: center ; color: white ; line-height: 30px">{{ $info->copyright }}</p>
    </div>
    <div id='easy-top'></div>

    <script type='text/javascript' src="{{ asset('js/bootstrap.min.js?ver=5.7.2') }}" id='bootstrap-js'></script>
    <script type='text/javascript' src="{{ asset('js/owl.carousel.min.js?ver=5.7.2') }}" id='carousel-js'></script>

    <script type='text/javascript' src="{{ asset('js/halimtheme-core.min.js?ver=1626273138') }}" id='halim-init-js'>
    </script>
    <script type='text/javascript' src="{{ asset('js/timkiem.js') }}"></script>
    <script>
        $(window).on('load', function() {
            $('#quangcao').modal('show');
        })
    </script>
    <script type='text/javascript'>
        function remove_background(movie_id) {
            for (var count = 1; count <= 5; count++) {
                $('#' + movie_id + '-' + count).css('color', '#ccc');
            }
        }
        //hover chuột đánh giá sao
        $(document).on('mouseenter', '.rating', function() {
            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');
            // alert(index);
            // alert(movie_id);
            remove_background(movie_id);
            for (var count = 1; count <= index; count++) {
                $('#' + movie_id + '-' + count).css('color', '#ffcc00');
            }
        });
        //nhả chuột ko đánh giá
        $(document).on('mouseleave', '.rating', function() {
            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');
            var rating = $(this).data("rating");
            remove_background(movie_id);
            //alert(rating);
            for (var count = 1; count <= rating; count++) {
                $('#' + movie_id + '-' + count).css('color', '#ffcc00');
            }
        });
        //click đánh giá sao
        $(document).on('click', '.rating', function() {

            var index = $(this).data("index");
            var movie_id = $(this).data('movie_id');

            $.ajax({
                url: "{{ route('add-rating') }}",
                method: "POST",
                data: {
                    index: index,
                    movie_id: movie_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data == 'done') {
                        alert("Bạn đã đánh giá " + index + " trên 5");
                        location.reload();
                    } else if (data == 'exist') {
                        alert("Bạn đã đánh giá phim này rồi,cảm ơn bạn nhé");
                    } else {
                        alert("Lỗi đánh giá");
                    }

                }
            });
        });
    </script>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0"
        nonce="gFKvdOtJ"></script>
    <script type='text/javascript' src="{{ asset('js/trailer.js') }}"></script>
    <style>
        #overlay_mb {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            cursor: pointer
        }

        #overlay_mb .overlay_mb_content {
            position: relative;
            height: 100%
        }

        .overlay_mb_block {
            display: inline-block;
            position: relative
        }

        #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
            width: 600px;
            height: auto;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center
        }

        #overlay_mb .overlay_mb_content .cls_ov {
            color: #fff;
            text-align: center;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 999999;
            font-size: 14px;
            padding: 4px 10px;
            border: 1px solid #aeaeae;
            background-color: rgba(0, 0, 0, 0.7)
        }

        #overlay_mb img {
            position: relative;
            z-index: 999
        }

        @media only screen and (max-width: 768px) {
            #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
                width: 400px;
                top: 3%;
                transform: translate(-50%, 3%)
            }
        }

        @media only screen and (max-width: 400px) {
            #overlay_mb .overlay_mb_content .overlay_mb_wrapper {
                width: 310px;
                top: 3%;
                transform: translate(-50%, 3%)
            }
        }
    </style>

    <style>
        #overlay_pc {
            position: fixed;
            display: none;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 99999;
            cursor: pointer;
        }

        #overlay_pc .overlay_pc_content {
            position: relative;
            height: 100%;
        }

        .overlay_pc_block {
            display: inline-block;
            position: relative;
        }

        #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
            width: 600px;
            height: auto;
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        #overlay_pc .overlay_pc_content .cls_ov {
            color: #fff;
            text-align: center;
            cursor: pointer;
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 999999;
            font-size: 14px;
            padding: 4px 10px;
            border: 1px solid #aeaeae;
            background-color: rgba(0, 0, 0, 0.7);
        }

        #overlay_pc img {
            position: relative;
            z-index: 999;
        }

        @media only screen and (max-width: 768px) {
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
                width: 400px;
                top: 3%;
                transform: translate(-50%, 3%);
            }
        }

        @media only screen and (max-width: 400px) {
            #overlay_pc .overlay_pc_content .overlay_pc_wrapper {
                width: 310px;
                top: 3%;
                transform: translate(-50%, 3%);
            }
        }
    </style>

    <style>
        .float-ck {
            position: fixed;
            bottom: 0px;
            z-index: 9
        }

        * html .float-ck

        /* IE6 position fixed Bottom */
            {
            position: absolute;
            bottom: auto;
            top: expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop, 10)||0)-(parseInt(this.currentStyle.marginBottom, 10)||0)));
        }

        #hide_float_left a {
            background: #0098D2;
            padding: 5px 15px 5px 15px;
            color: #FFF;
            font-weight: 700;
            float: left;
        }

        #hide_float_left_m a {
            background: #0098D2;
            padding: 5px 15px 5px 15px;
            color: #FFF;
            font-weight: 700;
        }

        span.bannermobi2 img {
            height: 70px;
            width: 300px;
        }

        #hide_float_right a {
            background: #01AEF0;
            padding: 5px 5px 1px 5px;
            color: #FFF;
            float: left;
        }
    </style>
</body>

</html>
