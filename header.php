<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?=$title?> | <?=$name?></title>
    <style>
        * {
            font-family: 'Inter', sans-serif;
            box-sizing: border-box;
            outline: 0;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .footer {
            background: #242424;
            color: white;
            padding: 25px 35px;
        }

        .nav {
            padding: 10px 25px;
            background: #242424;
            color: white;
        }

        .nav * {
            display: inline-block;
            margin: 0;
            color: white;
            text-decoration: none;
        }

        .button {
            font-size: 1em;
            background: #242424;
            color: white;
            cursor: pointer;
            border: 0;
            padding: 10px 25px;
            border-radius: 5px;
        }

        .button:hover {
            background: #181818;
        }

        .button:active {
            background: #101010;
        }

        main {
            padding: 15px 25px;
            text-align: center;
        }

        .article {
            width: 50%;
            max-width: 250px;
            min-width: 100px;
            margin: 10px 15px;
            display: inline-block;
            box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, 0.1), 0 0px 0 1px rgba(10, 10, 10, 0.02);
            padding: 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.125s;
            color: black;
        }
        
        .post {
            box-shadow: 0 0.5em 1em -0.125em rgba(10, 10, 10, 0.1), 0 0px 0 1px rgba(10, 10, 10, 0.02);
            padding: 5px 25px;
            border-radius: 5px;
            margin: 15px auto;
            color: black;
        }
        
        .post * {
            margin: 10px;
        }

        a {
            text-decoration: none;
        }

        .article:hover {
            box-shadow: 0 0.5em 1em 0.225em rgba(10, 10, 10, 0.1), 0 0px 0 1px rgba(10, 10, 10, 0.02);
        }

        .article:active {
            box-shadow: 0 0.1em 1em -0.35em rgba(10, 10, 10, 0.1), 0 0px 0 1px rgba(10, 10, 10, 0.02);
        }

        input {
            padding: 10px;
            border: 0;
            border-bottom: 1px solid hsla(0, 0%, 4%, .1);
            width: 100%;
            font-size: 1em;
        }

        .left {
            text-align: left;
        }

        .left * {
            text-align: left;
        }

        .pell,
        .pell-content {
            box-sizing: border-box
        }

        .pell {
            border: 1px solid rgba(10, 10, 10, .1)
        }

        .pell-content {
            height: 300px;
            outline: 0;
            overflow-y: auto;
            padding: 10px;
            position: relative
        }

        .pell-content:empty:before {
            content: attr(data-placeholder);
            position: absolute;
            color: rgba(10, 10, 10, .4)
        }

        .pell-content:empty:focus:before {
            color: rgba(10, 10, 10, .1)
        }

        .pell-actionbar {
            background-color: #fff;
            border-bottom: 1px solid rgba(10, 10, 10, .1)
        }

        .pell-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
            height: 30px;
            outline: 0;
            width: 30px;
            vertical-align: bottom
        }

        .pell-button-selected {
            background-color: #f0f0f0
        }

    </style>
    <script>
    !function(t,e){"object"==typeof exports&&"undefined"!=typeof module?e(exports):"function"==typeof define&&define.amd?define(["exports"],e):e(t.pell={})}(this,function(t){"use strict";var e=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var r in n)Object.prototype.hasOwnProperty.call(n,r)&&(t[r]=n[r])}return t},n=function(t,e,n){return t.addEventListener(e,n)},r=function(t,e){return t.appendChild(e)},i=function(t){return document.createElement(t)},o=function(t){return document.queryCommandState(t)},u=function(t){return document.queryCommandValue(t)},l=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:null;return document.execCommand(t,!1,e)},c={bold:{icon:"<b>B</b>",title:"Bold",state:function(){return o("bold")},result:function(){return l("bold")}},italic:{icon:"<i>I</i>",title:"Italic",state:function(){return o("italic")},result:function(){return l("italic")}},underline:{icon:"<u>U</u>",title:"Underline",state:function(){return o("underline")},result:function(){return l("underline")}},strikethrough:{icon:"<strike>S</strike>",title:"Strike-through",state:function(){return o("strikeThrough")},result:function(){return l("strikeThrough")}},heading1:{icon:"<b>H<sub>1</sub></b>",title:"Heading 1",result:function(){return l("formatBlock","<h1>")}},heading2:{icon:"<b>H<sub>2</sub></b>",title:"Heading 2",result:function(){return l("formatBlock","<h2>")}},paragraph:{icon:"&#182;",title:"Paragraph",result:function(){return l("formatBlock","<p>")}},quote:{icon:"&#8220; &#8221;",title:"Quote",result:function(){return l("formatBlock","<blockquote>")}},olist:{icon:"&#35;",title:"Ordered List",result:function(){return l("insertOrderedList")}},ulist:{icon:"&#8226;",title:"Unordered List",result:function(){return l("insertUnorderedList")}},code:{icon:"&lt;/&gt;",title:"Code",result:function(){return l("formatBlock","<pre>")}},line:{icon:"&#8213;",title:"Horizontal Line",result:function(){return l("insertHorizontalRule")}},link:{icon:"&#128279;",title:"Link",result:function(){var t=window.prompt("Enter the link URL");t&&l("createLink",t)}},image:{icon:"&#128247;",title:"Image",result:function(){var t=window.prompt("Enter the image URL");t&&l("insertImage",t)}}},a={actionbar:"pell-actionbar",button:"pell-button",content:"pell-content",selected:"pell-button-selected"},s=function(t){var o=t.actions?t.actions.map(function(t){return"string"==typeof t?c[t]:c[t.name]?e({},c[t.name],t):t}):Object.keys(c).map(function(t){return c[t]}),s=e({},a,t.classes),d=t.defaultParagraphSeparator||"div",f=i("div");f.className=s.actionbar,r(t.element,f);var p=t.element.content=i("div");return p.contentEditable=!0,p.className=s.content,t.placeholder&&(p.dataset.placeholder=t.placeholder),p.oninput=function(e){var n=e.target.firstChild;n&&3===n.nodeType?l("formatBlock","<"+d+">"):"<br>"===p.innerHTML&&(p.innerHTML=""),t.onChange(p.innerHTML)},p.onkeydown=function(t){"Tab"===t.key?t.preventDefault():"Enter"===t.key&&"blockquote"===u("formatBlock")&&setTimeout(function(){return l("formatBlock","<"+d+">")},0)},r(t.element,p),o.forEach(function(t){var e=i("button");if(e.className=s.button,e.innerHTML=t.icon,e.title=t.title,e.setAttribute("type","button"),e.onclick=function(){return t.result()&&p.focus()},t.state){var o=function(){return e.classList[t.state()?"add":"remove"](s.selected)};n(p,"keyup",o),n(p,"mouseup",o),n(e,"click",o)}r(f,e)}),t.styleWithCSS&&l("styleWithCSS"),l("defaultParagraphSeparator",d),t.element},d={exec:l,init:s};t.exec=l,t.init=s,t.default=d,Object.defineProperty(t,"__esModule",{value:!0})});
    </script>
</head>

<body>
    <div class="nav">
        <h3><a href="<?=$root?>"><?=$name?></a></h3>
    </div>
    <main>
