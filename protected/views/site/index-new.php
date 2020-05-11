
<!DOCTYPE html>
<!--[if lte IE 9]>
<html class="ie" lang="en">
<![endif]-->
<!--[if gt IE 9]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="UTF-8">
<title>sly</title>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@CodePen">
<meta name="twitter:title" content="sly">
<meta name="twitter:description" content="  Forked from [SitePoint](http://codepen.io/SitePoint/)&#39;s Pen [sly](http://codepen.io/SitePoint/pen/jWGJpY/)....">
<meta name="twitter:image" content="https://screenshot.codepen.io/263076.bEYOov.c4eb15c2-e147-498d-884d-c00845e5c62a.png">
<meta property="og:image" content="https://codepen.io/ritz078/pen/bEYOov/image/large.png" itemprop="thumbnailUrl">
<meta property="og:title" content="sly">
<meta property="og:url" content="https://codepen.io/ritz078/details/bEYOov">
<meta property="og:site_name" content="CodePen">
<meta property="og:description" content="  Forked from [SitePoint](http://codepen.io/SitePoint/)&#39;s Pen [sly](http://codepen.io/SitePoint/pen/jWGJpY/)....">
<link rel="alternate" type="application/json+oembed" href="https://codepen.io/api/oembed?url=https%3A%2F%2Fcodepen.io%2Fritz078%2Fpen%2FbEYOov&format=json" title="sly" />
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic" rel="stylesheet" />
<link rel="stylesheet" media="all" href="https://static.codepen.io/assets/global/global-d8d746a5e4843ed1b1edb97b6aa784ee773d80bb8d9c0c5381a9b60b63c3ccd4.css" />
<link rel="stylesheet" media="screen" href="https://static.codepen.io/assets/packs/css/everypage-3f460354.css" />
<link rel="stylesheet" media="all" href="https://static.codepen.io/assets/editor/editor-1325a102457dc295d2f3640dab8f14583c17121f23cf6353c62fecc7a3509eb3.css" />
<meta name="description" content="  Forked from [SitePoint](http://codepen.io/SitePoint/)&#39;s Pen [sly](http://codepen.io/SitePoint/pen/jWGJpY/)....">
<link rel="stylesheet" media="screen" href="https://static.codepen.io/assets/editor/themes/twilight-c4d2eafba805f08fdb40c0900ac100b78469aba0532ca487a4fb1591a9424a02.css" id="cm-theme" />
<style id="cm-font-family" class="cm-font-family">
  
      
  .CodeMirror,
  .console-logs .console-line,
  .console-command-line-input,
  .console-message,
  .CodeMirror-hint {
    font-family: Monaco, MonoSpace;
  }
</style>
<style id="cm-font-size">
  .CodeMirror,
  .console-logs .console-line,
  .console-command-line-input,
  .console-message,
  .CodeMirror-hint {
    font-size: 14px;
  }
</style>
<link rel="apple-touch-icon" type="image/png" href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">
<link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<meta name="csrf-param" content="authenticity_token" />
<meta name="csrf-token" content="Ta4viesYNax29ziKiNAhWexz+0V8s7ryGmwugcPwjGalp+nl+OYxKeXptgssAXcMK2ExcwuDXoPTNkQpqL3y5w==" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<script>/* Firefox needs this to prevent FOUC. */</script>
</head>
<body class="room-editor editor state-htmlOn-cssOn-jsOn sidebar-false preload prelayout
  layout-top
 logged-out ">
<header class="main-header" id="main-header">
</header>
<div class="item-settings-modal tab-layout tab-layout-modal pen  item-settings-modal-half" id="item-settings-modal">
<header class="item-settings-modal-header tab-layout-header">
<h2 class="item-settings-modal-header-title tab-layout-header-title">Pen Settings</h2>
<div class="save-and-close-wrap">
<button type="button" class="button mini-button button-no-right-margin close" id="top-close-settings">
<svg class="icon-x">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
</button>
</div>
</header>
<div class="tabs tab-layout-wrapper settings-tabs-wrapper">
<nav id="settings-tabs" class="no-mobile-nav tab-layout-tabs item-settings-tabs">
<div class="tab-layout-tab-group">
<a id="settings-html-tab" href="#settings-html" class="settings-tab-html" data-type="html">
HTML
</a>
<a id="settings-css-tab" href="#settings-css" class="settings-tab-css" data-type="css">
CSS
</a>
<a id="settings-js-tab" href="#settings-js" class="settings-tab-js" data-type="js">
JS
</a>
</div>
<div class="tab-layout-tab-group">
<a id="settings-behavior-tab" href="#settings-behavior" class="settings-tab-behavior" data-type="behavior">
Behavior
</a>
<a id="settings-editor-tab" href="#settings-editor" class="settings-tab-editor" data-type="editor">
Editor
</a>
</div>
</nav>
<div class="settings tab-page" id="settings-html">
<h3 aria-label="HTML">HTML</h3>
<form class="settings-row top-label-form normal-labels preprocessor-choice group">
<h4>
<label for="html-preprocessor">HTML Preprocessor</label>
</h4>
<div class="help-flyout-link">
<svg class="icon-help">
<use xlink:href="/svg_sprite?v=9637ff09#help"></use>
</svg>
<div class="help-flyout help-flyout-reverse">
<h5>About HTML Preprocessors</h5>
<svg class="icon-x">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
<p>HTML preprocessors can make writing HTML more powerful or convenient. For instance, Markdown is designed to be easier to write and read for text documents and you could write a loop in Pug.</p>
<p><a href="https://blog.codepen.io/documentation/editor/using-html-preprocessors/" target="_blank" rel="noopener">Learn more</a> &middot; <a href="/versions/" target="_blank" rel="noopener">Versions</a></p>
</div>
</div>
<div class="custom-select-wrap">
<select name="html-preprocessor" id="html-preprocessor" class="fullwidth">
<option value="none">None</option>
<option value="haml">Haml</option>
<option value="markdown">Markdown</option>
<option value="slim">Slim</option>
<option value="pug">Pug</option>
</select>
<div class="select-icon">
<svg class="icon-arrow-down-mini">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
<svg class="icon-arrow-down-mini">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
</div>
</div>
</form>
<form class="settings-row top-label-form normal-labels prevent-form-submit" onsubmit="return false;">
<h4>
<label for="html-classes">Add Class(es) to &lt;html></label>
</h4>
<div class="help-flyout-link">
<svg class="icon-help">
<use xlink:href="/svg_sprite?v=9637ff09#help"></use>
</svg>
<div class="help-flyout help-flyout-reverse">
<h5>Adding Classes</h5>
<svg class="icon-x">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
<p>In CodePen, whatever you write in the HTML editor is what goes within the <code>&lt;body></code> tags in <a target="_blank" rel="noopener" href="https://blog.codepen.io/documentation/features/preview-template/">a basic HTML5 template</a>. So you don't have access to higher-up elements like the <code>&lt;html></code> tag. If you want to add classes there that can affect the whole document, this is the place to do it.</p>
</div>
</div>
<input type="text" id="html-classes" name="html-classes" class="fullwidth" placeholder="e.g. single post post-1234" maxlength="250">
</form>
<form class="settings-row top-label-form normal-labels prevent-form-submit" onsubmit="return false;">
<h4>
<label for="head-content">Stuff for &lt;head></label>
</h4>
<div class="help-flyout-link">
<svg class="icon-help">
<use xlink:href="/svg_sprite?v=9637ff09#help"></use>
</svg>
<div class="help-flyout help-flyout-reverse">
<h5>About the &lt;head></h5>
<svg class="icon-x">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
<p>In CodePen, whatever you write in the HTML editor is what goes within the <code>&lt;body></code> tags in <a target="_blank" rel="noopener" href="https://blog.codepen.io/documentation/features/preview-template/">a basic HTML5 template</a>. If you need things in the <code>&lt;head></code> of the document, put that code here.</p>
</div>
</div>
<div class="head-content-wrapper">
<textarea id="head-content" name="head-content" class="fullwidth is-code head-content" placeholder="e.g. &lt;meta>, &lt;link>, &lt;script>"></textarea>
<span class="insecure-resource-tooltip">
<div class="help-flyout-link">
<span class="icon-help">!</span>
<div class="help-flyout help-flyout-reverse">
<svg class="icon-x">
<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
<h5>Insecure Resource</h5>
<p>The resource you are linking to is using the 'http' protocol, which may not work when the browser is using https.</p>
</div>
</div>
</span>
</div>
<button class="button mini-button button-medium" id="meta-tag-insert">↑ Insert the most common viewport meta tag</button>
</form>
</div>
<div class="settings tab-page" id="settings-css">
<h3 aria-label="CSS">CSS</h3>
<form class="settings-row settings-row-1 top-label-form normal-labels preprocessor-choice group">
<h4>
<label for="css-preprocessor">CSS Preprocessor</label>
</h4>
<div class="help-flyout-link">
<svg class="icon-help">
<use xlink:href="/svg_sprite?v=9637ff09#help"></use>
</svg>
<div class="help-flyout help-flyout-reverse">
<h5>About CSS Preprocessors</h5>
<svg class="icon-x">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
<p>CSS preprocessors help make authoring CSS easier. All of them offer things like variables and mixins to provide convenient abstractions.</p>
<p><a href="https://blog.codepen.io/documentation/editor/using-css-preprocessors/" target="_blank">Learn more</a> &middot; <a href="/versions/" target="_blank">Versions</a></p>
</div>
</div>
<div class="custom-select-wrap">
<select name="css-preprocessor" id="css-preprocessor" class="fullwidth css-preprocessor">
<option value="none">None</option>
<option value="less">Less</option>
<option value="scss">SCSS</option>
<option value="sass">Sass</option>
<option value="stylus">Stylus</option>
<option value="postcss">PostCSS</option>
</select>
<div class="select-icon">
<svg class="icon-arrow-down-mini">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
<svg class="icon-arrow-down-mini">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
</div>
</div>
<div id="need-an-addon" class="align-right hide">
<a id="css-need-an-addon-button" href="#0" class="button button-medium mini-button need-an-addon-button">
Need an add-on?
</a>
</div>
<div class="add-ons add-ons-scss hide" id="add-ons"></div>
</form>
<form id="startercss-options-form" class="settings-row settings-row-2 top-label-form prevent-form-submit" onsubmit="return false;">
<h4>
CSS Base
</h4>
<div class="help-flyout-link">
<svg class="icon-help">
<use xlink:href="/svg_sprite?v=9637ff09#help"></use>
</svg>
<div class="help-flyout help-flyout-reverse">
<h5>About CSS Base</h5>
<svg class="icon-x">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
<p>It's a common practice to apply CSS to a page that styles elements such that they are consistent across all browsers. We offer two of the most popular choices: <a href="https://necolas.github.io/normalize.css/" target="_blank" rel="noopener">normalize.css</a> and a <a href="http://meyerweb.com/eric/tools/css/reset/" target="_blank" rel="noopener">reset</a>. Or, choose <b>Neither</b> and nothing will be applied.</p>
</div>
</div>
<ul class="radio-list">
<li>
<input type="radio" id="startercss-normalize" name="startercss" checked value="normalize">
<label for="startercss-normalize" class="small-inline">Normalize</label>
</li>
<li>
<input type="radio" id="startercss-reset" name="startercss" checked value="reset">
<label for="startercss-reset" class="small-inline">Reset</label>
</li>
<li>
<input type="radio" id="startercss-neither" name="startercss" checked value="neither">
<label for="startercss-neither" class="small-inline">Neither</label>
</li>
</ul>
</form>
<form id="prefix-options-form" class="settings-row settings-row-3 top-label-form">
<h4>
Vendor Prefixing
</h4>
<div class="help-flyout-link">
<svg class="icon-help">
<use xlink:href="/svg_sprite?v=9637ff09#help"></use>
</svg>
<div class="help-flyout help-flyout-reverse">
<h5>About Vendor Prefixing</h5>
<svg class="icon-x">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
<p>To get the best cross-browser support, it is a common practice to apply vendor prefixes to CSS properties and values that require them to work. For instance <code>-webkit-</code> or <code>-moz-</code>.</p>
<p>We offer two popular choices: <a href="https://github.com/postcss/autoprefixer" target="blank" rel="noopener">Autoprefixer</a> (which processes your CSS server-side) and <a href="https://leaverou.github.io/prefixfree/" target="_blank" rel="noopener">-prefix-free</a> (which applies prefixes via a script, client-side).</p>
</div>
</div>
<ul class="radio-list">
<li>
<input type="radio" id="prefix-autoprefixer" name="prefix" value="autoprefixer">
<label for="prefix-autoprefixer" class="small-inline">Autoprefixer</label>
</li>
<li>
<input type="radio" id="prefix-prefixfree" name="prefix" value="prefixfree">
<label for="prefix-prefixfree" class="small-inline">Prefixfree</label>
</li>
<li>
<input type="radio" id="prefix-neither" name="prefix" value="neither">
<label for="prefix-neither" class="small-inline">Neither</label>
</li>
</ul>
</form>
<form id="external-css-resources" class="settings-row settings-row-4 top-label-form prevent-form-submit" onsubmit="return false;">
<h4>
Add External Stylesheets/Pens
</h4>
<p>Any URL's added here will be added as <code>&lt;link></code>s in order, and before the CSS in the editor. If you link to another Pen, it will include the CSS from that Pen. If the preprocessor matches, it will attempt to combine them before processing.</p>
<div class="resource-search-bar">
<svg class="icon icon-mag">
<use xlink:href="/svg_sprite?v=9637ff09#mag"></use>
</svg>
<input id="external-css-search" type="text" value="" placeholder="Search for resources (Bootstrap, Foundation, Animate.css...)">
</div>
<div class="algolia-shoutout">
<a href="https://www.algolia.com/?utm_source=react-instantsearch&utm_medium=website&utm_content=codepen.io&utm_campaign=poweredby" target="_blank">
Powered by <img alt="Algolia" src="https://static.codepen.io/assets/settings/algolia-9e1c0c887f4db420704b2a79926864019ef156bcecc9d5774a7e4eaa731fc5b5.svg" />
</a>
</div>
<div class="help-flyout-link">
<svg class="icon-help">
<use xlink:href="/svg_sprite?v=9637ff09#help"></use>
</svg>
<div class="help-flyout help-flyout-reverse">
<h5>About External Resources</h5>
<svg class="icon-x">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
<p>You can apply CSS to your Pen from any stylesheet on the web. Just put a URL to it here and we'll apply it, in the order you have them, before the CSS in the Pen itself.</p>
<p>If the stylesheet you link to has the file extension of a preprocessor, we'll attempt to process it before applying.</p>
<p>You can also link to another Pen here, and we'll pull the CSS from that Pen and include it. If it's using a matching preprocessor, we'll combine the code before preprocessing, so you can use the linked Pen as a true dependency.</p>
<p><a href="https://blog.codepen.io/documentation/editor/adding-external-resources/" target="_blank" rel="noopener">Learn more</a></p>
</div>
</div>
<div id="css-external-resources" class="external-resource-wrapper">
</div>
<script id="css-external-resources-template" type="text/template">
  <div data-view-id="<%= view_id %>" class="external-resource-url-row <%= insecure_resource %>">

    <span class="move-external-url">
      <svg class="icon-drag-handle" width="20" height="17">
        <use xlink:href="/svg_sprite?v=9637ff09#drag-handle" />
      </svg>
    </span>

    <input
      id="external-resource-input-<%= view_id %>"
      class="fullwidth css-resource external-resource"
      type="text"
      pattern="^((ftp|http|https):)?\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$"
      name="external-css"
      placeholder="<%= placeholder %>"
      value="<%= url %>"
      data-view-id="<%= view_id %>">

    <span class="insecure-resource-tooltip">
      <div class="help-flyout-link">
        <span class="icon-help">!</span>
        <div class="help-flyout help-flyout-reverse">
          <svg class="icon-x">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/svg_sprite?v=9637ff09#x"></use>
          </svg>
          <h5>Insecure Resource</h5>
          <p>You are linking to a resource using the non-secure http:// protocol, which may not work when the browser is using https:// like CodePen enforces.</p>
        </div>
      </div>
    </span>

    <div class="resource-actions">
      <span class="remove-external-url external-url-option" data-view-id="<%= view_id %>">
        <svg class="icon-x" width="12" height="12">
          <use xlink:href="/svg_sprite?v=9637ff09#x" />
        </svg>
      </span>

      <a id="external-resource-input-view-link-<%= view_id %>" class="open-external-url external-url-option" target="_blank" rel="noopener" data-view-id="<%= view_id %>" href="<%= url %>">
        <svg class="icon-eye" width="14" height="14">
          <use xlink:href="/svg_sprite?v=9637ff09#eye" />
        </svg>
      </a>
    </div>

  </div>
</script>
<div class="external-resource-actions group">
<span id="add-css-resource" class="button mini-button button-medium add-resource" data-type="css">
<span data-type="css">+ add another resource</span>
</span>
</div>
</form>
</div>
<div class="settings tab-page" id="settings-js">
<div class="item-settings-javascript normal-labels">
<h3 aria-label="JavaScript">JavaScript</h3>
<div class="item-settings-javascript-preprocessor settings-row">
<h4>
<label for="js-preprocessor">JavaScript Preprocessor</label>
</h4>
<div class="help-flyout-link">
<svg class="icon-help" width="14" height="14">
<use xlink:href="/svg_sprite?v=9637ff09#help"></use>
</svg>
<div class="help-flyout help-flyout-reverse">
<h5>About JavaScript Preprocessors</h5>
<svg class="icon-x" width="12" height="12">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
<p>JavaScript preprocessors can help make authoring JavaScript easier and more convenient. For instance, CoffeeScript can help prevent easy-to-make mistakes and offer a cleaner syntax and Babel can bring ECMAScript 6 features to browsers that only support ECMAScript 5.</p>
<p><a href="https://blog.codepen.io/documentation/editor/using-js-preprocessors/" target="_blank" rel="noopener">Learn more</a> &middot; <a href="/versions/" target="_blank">Versions</a></p>
</div>
</div>
<div class="custom-select-wrap">
<select name="js-preprocessor" id="js-preprocessor" class="fullwidth">
<option value="none">None</option>
<option value="babel">Babel</option>
<option value="typescript">TypeScript</option>
<option value="coffeescript">CoffeeScript</option>
<option value="livescript">LiveScript</option>
</select>
<div class="select-icon">
<svg class="icon-arrow-down-mini">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
<svg class="icon-arrow-down-mini">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
</div>
</div>
<div class="processing-packages-message callout hide" id="processing-packages-message">
Babel is required to process package imports. If you need a different preprocessor remove all packages first.
</div>
</div>
<div id="external-js-resources" class="item-settings-javascript-external settings-row external-js-resources top-label-form prevent-form-submit" onsubmit="return false;">
<h4>
Add External Scripts/Pens
</h4>
<p>Any URL's added here will be added as <code>&lt;script></code>s in order, and run <em>before</em> the JavaScript in the editor. You can use the URL of any other Pen and it will include the JavaScript from that Pen.</p>
<div class="resource-search-bar">
<svg class="icon icon-mag" width="18" height="18">
<use xlink:href="/svg_sprite?v=9637ff09#mag"></use>
</svg>
<input id="external-js-search" type="text" value="" placeholder="Search CDNjs (jQuery, Lodash, React, Angular, Vue.js, Ember...)">
</div>
<div class="algolia-shoutout">
<a href="https://www.algolia.com/?utm_source=react-instantsearch&utm_medium=website&utm_content=codepen.io&utm_campaign=poweredby" target="_blank">
Powered by <img alt="Algolia" src="https://static.codepen.io/assets/settings/algolia-9e1c0c887f4db420704b2a79926864019ef156bcecc9d5774a7e4eaa731fc5b5.svg" />
</a>
</div>
<div class="help-flyout-link">
<svg class="icon-help" width="14" height="14">
<use xlink:href="/svg_sprite?v=9637ff09#help"></use>
</svg>
<div class="help-flyout help-flyout-reverse">
<h5>About External Resources</h5>
<svg class="icon-x" width="12" height="12">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
<p>You can apply a script from anywhere on the web to your Pen. Just put a URL to it here and we'll add it, in the order you have them, before the JavaScript in the Pen itself.</p>
<p>If the script you link to has the file extension of a preprocessor, we'll attempt to process it before applying.</p>
<p>You can also link to another Pen here, and we'll pull the JavaScript from that Pen and include it. If it's using a matching preprocessor, we'll combine the code before preprocessing, so you can use the linked Pen as a true dependency.</p>
<p><a href="https://blog.codepen.io/documentation/editor/adding-external-resources/" target="_blank">Learn more</a></p>
</div>
</div>
<div id="js-external-resources" class="external-resource-wrapper">
</div>
<script id="js-external-resources-template" type="text/template">
  <div data-view-id="<%= view_id %>" class="external-resource-url-row <%= insecure_resource %>">

    <span class="move-external-url">
      <svg class="icon-drag-handle" width="20" height="17">
        <use xlink:href="/svg_sprite?v=9637ff09#drag-handle" />
      </svg>
    </span>

    <input
      id="external-resource-input-<%= view_id %>"
      class="fullwidth js-resource external-resource"
      type="text"
      pattern="^((ftp|http|https):)?\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?$"
      name="external-js"
      placeholder="<%= placeholder %>"
      value="<%= url %>"
      data-view-id="<%= view_id %>">

    <span class="insecure-resource-tooltip">
      <div class="help-flyout-link">
        <span class="icon-help">!</span>
        <div class="help-flyout help-flyout-reverse">
          <svg class="icon-x">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/svg_sprite?v=9637ff09#x"></use>
          </svg>
          <h5>Insecure Resource</h5>
          <p>You are linking to a resource using the non-secure http:// protocol, which may not work when the browser is using https:// like CodePen enforces.</p>
        </div>
      </div>
    </span>

    <div class="resource-actions">
      <span class="remove-external-url external-url-option" data-view-id="<%= view_id %>">
        <svg class="icon-x" width="12" height="12">
          <use xlink:href="/svg_sprite?v=9637ff09#x" />
        </svg>
      </span>

      <a id="external-resource-input-view-link-<%= view_id %>" class="open-external-url external-url-option" target="_blank" rel="noopener" data-view-id="<%= view_id %>" href="<%= url %>">
        <svg class="icon-eye" width="14" height="14">
          <use xlink:href="/svg_sprite?v=9637ff09#eye" />
        </svg>
      </a>
    </div>

  </div>
</script>
<div class="external-resource-actions group">
<span id="add-js-resource" class="button button-medium mini-button add-resource" data-type="js">
<span data-type="js">+ add another resource</span>
</span>
</div>
</div>
</div>
</div>
<div class="settings tab-page" id="settings-behavior">
<h3 aria-label="Pen Behavior">Behavior</h3>
<div class="settings-row">
<h4>Save Automatically?</h4>
<div>
<p class="hint">If active, Pens will autosave every 30 seconds after being saved once.</p>
<div class="ios-toggle-mega-label-wrap">
<span class="ios-toggle ios-toggle-ambiguous">
<input type="checkbox" id="auto-save" name="auto-save" checked>
<label for="auto-save"></label>
<label for="auto-save" class="ios-toggle-mega-label"></label>
</span>
</div>
</div>
</div>
<div class="settings-row">
<h4>Auto-Updating Preview</h4>
<p class="hint">If enabled, the preview panel updates automatically as you code. If disabled, use the "Run" button to update.</p>
<div class="ios-toggle-mega-label-wrap">
<span class="ios-toggle ios-toggle-ambiguous">
<input type="checkbox" id="auto-run" name="auto-run" checked>
<label for="auto-run"></label>
<label for="auto-run" class="ios-toggle-mega-label"></label>
</span>
</div>
</div>
<div class="settings-row">
<h4>Format on Save</h4>
<p class="hint">If enabled, your code will be formatted when you actively save your Pen. <span style="color: #ffdc40; font-weight: bold;">Note:</span> your code becomes un-folded during formatting.</p>
<div class="ios-toggle-mega-label-wrap">
<span class="ios-toggle ios-toggle-ambiguous">
<input type="checkbox" id="format_on_save" name="format_on_save">
<label for="format_on_save"></label>
<label for="format_on_save" class="ios-toggle-mega-label"></label>
</span>
</div>
</div>
</div>
<div class="settings tab-page" id="settings-editor">
<h3 aria-label="Editor Settings">Editor Settings</h3>
<form id="editor-settings-form" class="settings-row settings-row-1 top-label-form prevent-form-submit" onsubmit="return false;">
<h4>Code Indentation</h4>
<div class="settings-row">
<ul class="radio-list">
<li>
<input type="radio" id="indent-with-spaces" name="indent-with" value="spaces" checked>
<label for="indent-with-spaces" class="small-inline">Spaces</label>
</li>
<li>
<input type="radio" id="indent-with-tabs" name="indent-with" value="tabs">
<label for="indent-with-tabs" class="small-inline">Tabs</label>
</li>
</ul>
</div>
<div class="settings-row top-label-form normal-labels">
<h4><label for="tab-size">Indent width</label></h4>
<div class="custom-select-wrap">
<select id="tab-size" class="fullwidth" name="tab-size">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
</select>
<div class="select-icon">
<svg class="icon-arrow-down-mini">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
<svg class="icon-arrow-down-mini">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
</div>
</div>
</div>
</form>
<div class="settings-row">
<h4>Want to change your Syntax Highlighting theme, Fonts and more?</h4>
<p>Visit <a href="/settings/editor" target="_blank">your global Editor Settings</a>.</p>
</div>
</div>
</div>
<footer>
<div class="save-and-close-wrap">
<input type="button" class="button button-small green button-no-right-margin close" value="Close" id="close-settings">
</div>
</footer>
</div>
<div class="tour-modals">
<div id="tour-intro-modal" class="tour-modal tour-intro-modal">
<h2 id="tour-intro-modal-heading" class="tour-intro-modal-heading"></h2>
<p id="tour-intro-modal-description" class="tour-intro-modal-description"></p>
<a href="#" id="tour-intro-start-btn" class="tour-intro-start-btn button green"></a>
<a href="#" id="tour-intro-cancel-link" class="tour-cancel-link"></a>
</div>
<div id="tour-step-modal" class="tour-modal tour-step-modal">
<div class="tour-modal-instructions">
<p id="tour-step-modal-instruction" class="tour-modal-instruction">HTML Settings</p>
<p id="tour-step-modal-info" class="tour-modal-further-info">Here you can Sed posuere consectetur est at lobortis. Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna. Donec id elit non mi porta gravida at eget metus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. </p>
</div>
<div id="tour-progress" class="tour-progress">
<div id="tour-progress-indicator" class="tour-progress-indicator"></div>
</div>
<div class="tour-next-step">
<a id="tour-step-next-btn" class="tour-next-step-btn button green">Next Step</a>
<a id="tour-step-cancel" class="tour-cancel-link" href="#">Leave tour</a>
</div>
<div id="tour-step-modal-arrow" class="tour-step-modal-arrow"></div>
</div>
<div id="tour-complete-modal" class="tour-modal tour-complete-modal">
<h2 id="tour-complete-modal-heading" class="tour-intro-complete-heading"></h2>
<p id="tour-complete-modal-description" class="tour-intro-complete-description"></p>
<a href="#" id="tour-complete-option-1" class="tour-intro-start-btn button green"></a>
<a href="#" id="tour-complete-option-2" class="tour-cancel-link"></a>
<a href="#" id="tour-complete-option-3" class="tour-cancel-link"></a>
<a href="#" id="tour-complete-option-4" class="tour-cancel-link"></a>
</div>
</div>
<div id="tour-overlay" class="tour-overlay">
<div id="tour-overlay-section-0" class="tour-overlay-section"></div>
<div id="tour-overlay-section-1" class="tour-overlay-section"></div>
<div id="tour-overlay-section-2" class="tour-overlay-section"></div>
<div id="tour-overlay-section-3" class="tour-overlay-section"></div>
</div>
<div class="page-wrap twilight">
<div class="boxes">
<div class="mobile-editor-nav">
<button id="html-toggle" class="selected"><span>HTML</span></button>
<button id="css-toggle"><span>CSS</span></button>
<button id="js-toggle"><span>JS</span></button>
<button id="result-toggle" class="selected"><span>Result</span></button>
</div>
<div class="top-boxes editor-parent" data-number-of-editors="3">
<div class="editor-resizer html-editor-resizer" title="Double-click to expand."></div>
<div id="box-html" class="box box-html" data-type="html">
<div class="powers">
<div class="powers-drag-handle" title="Double-click to expand."></div>
<div class="editor-actions-left">
<button id="settings-pane-html" class="button button-medium mini-button settings-nub" data-type="html" title="Open HTML Settings">
<svg class="icon-gear" width="10" height="10">
<use xlink:href="/svg_sprite?v=9637ff09#gear"></use>
</svg>
</button>
<h2 class="box-title html-editor-title" id="html-editor-title">
<span class="box-title-name">
HTML
</span>
<span class="box-title-preprocessor-name "></span>
</h2>
</div>
<div class="editor-actions-right">
<div class="collaborators-indicators"></div>
<button class="button mini-button button-medium editor-dropdown-button editor-dropdown-button-html" data-dropdown="#editor-dropdown-html" aria-haspopup="true" aria-expanded="false">
<span class="visually-hidden">
HTML Options
</span>
<svg class="icon-arrow-down-mini" width="10" height="10">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
</button>
<ul id="editor-dropdown-html" class="link-list is-dropdown editor-dropdown editor-dropdown-html" data-dropdown-position="css" data-dropdown-type="html">
<li class="editor-dropdown-list-item">
<button id="tidy-html" class="invisible-button tidy-code-button" data-editor-type="html">
Format HTML
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="view-compiled-html" class="invisible-button view-compiled-button" data-editor-type="html">
View Compiled HTML
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="analyze-html" class="invisible-button analyze-button" data-editor-type="html">
Analyze HTML
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="maximize-html-editor" class="invisible-button maximize-button" data-editor-type="html">
Maximize HTML Editor
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="minimize-html-editor" class="invisible-button minimize-button" data-editor-type="html">
Minimize HTML Editor
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="fold-all-html" class="invisible-button fold-all-button" data-editor-type="html">
Fold All
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="unfold-all-html" class="invisible-button unfold-all-button" data-editor-type="html">
Unfold All
</button>
</li>
</ul>
</div>
</div>
<div class="code-wrap">
<pre id="html" class="code-box" aria-labeledby="html-editor-title">
              <code>
                &lt;div class=&quot;wrap&quot;&gt;
  &lt;h2&gt;Basic &lt;small&gt;- with all the navigation options enabled&lt;/small&gt;&lt;/h2&gt;

  &lt;div class=&quot;scrollbar&quot;&gt;
    &lt;div class=&quot;handle&quot;&gt;
      &lt;div class=&quot;mousearea&quot;&gt;&lt;/div&gt;
    &lt;/div&gt;
  &lt;/div&gt;

  &lt;div class=&quot;frame&quot; id=&quot;basic&quot;&gt;
    &lt;ul class=&quot;clearfix&quot;&gt;
      &lt;li&gt;0&lt;/li&gt;
      &lt;li&gt;1&lt;/li&gt;
      &lt;li&gt;2&lt;/li&gt;
      &lt;li&gt;3&lt;/li&gt;
      &lt;li&gt;4&lt;/li&gt;
      &lt;li&gt;5&lt;/li&gt;
      &lt;li&gt;6&lt;/li&gt;
      &lt;li&gt;7&lt;/li&gt;
      &lt;li&gt;8&lt;/li&gt;
      &lt;li&gt;9&lt;/li&gt;
      &lt;li&gt;10&lt;/li&gt;
      &lt;li&gt;11&lt;/li&gt;
      &lt;li&gt;12&lt;/li&gt;
      &lt;li&gt;13&lt;/li&gt;
      &lt;li&gt;14&lt;/li&gt;
      &lt;li&gt;15&lt;/li&gt;
      &lt;li&gt;16&lt;/li&gt;
      &lt;li&gt;17&lt;/li&gt;
      &lt;li&gt;18&lt;/li&gt;
      &lt;li&gt;19&lt;/li&gt;
      &lt;li&gt;20&lt;/li&gt;
      &lt;li&gt;21&lt;/li&gt;
      &lt;li&gt;22&lt;/li&gt;
      &lt;li&gt;23&lt;/li&gt;
      &lt;li&gt;24&lt;/li&gt;
      &lt;li&gt;25&lt;/li&gt;
      &lt;li&gt;26&lt;/li&gt;
      &lt;li&gt;27&lt;/li&gt;
      &lt;li&gt;28&lt;/li&gt;
      &lt;li&gt;29&lt;/li&gt;
    &lt;/ul&gt;
  &lt;/div&gt;

  &lt;ul class=&quot;pages&quot;&gt;&lt;/ul&gt;

  &lt;div class=&quot;controls center&quot;&gt;
    &lt;button class=&quot;btn prevPage&quot;&gt;&lt;i class=&quot;icon-chevron-left&quot;&gt;&lt;/i&gt;&lt;i class=&quot;icon-chevron-left&quot;&gt;&lt;/i&gt; page&lt;/button&gt;
    &lt;button class=&quot;btn prev&quot;&gt;&lt;i class=&quot;icon-chevron-left&quot;&gt;&lt;/i&gt; item&lt;/button&gt;
    &lt;button class=&quot;btn backward&quot;&gt;&lt;i class=&quot;icon-chevron-left&quot;&gt;&lt;/i&gt; move&lt;/button&gt;

    &lt;div class=&quot;btn-group&quot;&gt;
      &lt;button class=&quot;btn toStart&quot;&gt;toStart&lt;/button&gt;
      &lt;button class=&quot;btn toCenter&quot;&gt;toCenter&lt;/button&gt;
      &lt;button class=&quot;btn toEnd&quot;&gt;toEnd&lt;/button&gt;
    &lt;/div&gt;

    &lt;div class=&quot;btn-group&quot;&gt;
      &lt;button class=&quot;btn toStart&quot; data-item=&quot;10&quot;&gt;&lt;strong&gt;10&lt;/strong&gt; toStart&lt;/button&gt;
      &lt;button class=&quot;btn toCenter&quot; data-item=&quot;10&quot;&gt;&lt;strong&gt;10&lt;/strong&gt; toCenter&lt;/button&gt;
      &lt;button class=&quot;btn toEnd&quot; data-item=&quot;10&quot;&gt;&lt;strong&gt;10&lt;/strong&gt; toEnd&lt;/button&gt;
    &lt;/div&gt;

    &lt;div class=&quot;btn-group&quot;&gt;
      &lt;button class=&quot;btn add&quot;&gt;&lt;i class=&quot;icon-plus-sign&quot;&gt;&lt;/i&gt;&lt;/button&gt;
      &lt;button class=&quot;btn remove&quot;&gt;&lt;i class=&quot;icon-minus-sign&quot;&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;/div&gt;

    &lt;button class=&quot;btn forward&quot;&gt;move &lt;i class=&quot;icon-chevron-right&quot;&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;button class=&quot;btn next&quot;&gt;item &lt;i class=&quot;icon-chevron-right&quot;&gt;&lt;/i&gt;&lt;/button&gt;
    &lt;button class=&quot;btn nextPage&quot;&gt;page &lt;i class=&quot;icon-chevron-right&quot;&gt;&lt;/i&gt;&lt;i class=&quot;icon-chevron-right&quot;&gt;&lt;/i&gt;&lt;/button&gt;
  &lt;/div&gt;
&lt;/div&gt;
              </code>
            </pre>
<div class="error-bar" id="error-bar-html">
<span class="error-icon" data-type="html">
!
</span>
</div>
</div>
</div>
<div class="editor-resizer css-editor-resizer" title="Double-click to expand."></div>
<div id="box-css" class="box box-css" data-type="css">
<div class="powers">
<div class="powers-drag-handle" title="Double-click to expand."></div>
<div class="editor-actions-left">
<button id="settings-pane-css" class="button button-medium mini-button settings-nub" data-type="css" title="Open CSS Settings">
<svg class="icon-gear" width="10" height="10">
<use xlink:href="/svg_sprite?v=9637ff09#gear"></use>
</svg>
</button>
<h2 class="box-title css-editor-title" id="css-editor-title">
<span class="box-title-name">
CSS
</span>
<span class="box-title-preprocessor-name "></span>
</h2>
</div>
<div class="editor-actions-right">
<div class="collaborators-indicators"></div>
<button class="button mini-button button-medium editor-dropdown-button editor-dropdown-button-css" data-dropdown="#editor-dropdown-css" aria-haspopup="true" aria-expanded="false">
<span class="visually-hidden">
CSS Options
</span>
<svg class="icon-arrow-down-mini" width="10" height="10">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
</button>
<ul id="editor-dropdown-css" class="link-list is-dropdown editor-dropdown editor-dropdown-css" data-dropdown-position="css" data-dropdown-type="css">
<li class="editor-dropdown-list-item">
<button id="tidy-css" class="invisible-button tidy-code-button" data-editor-type="css">
Format CSS
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="view-compiled-css" class="invisible-button view-compiled-button" data-editor-type="css">
View Compiled CSS
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="analyze-css" class="invisible-button analyze-button" data-editor-type="css">
Analyze CSS
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="maximize-css-editor" class="invisible-button maximize-button" data-editor-type="css">
Maximize CSS Editor
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="minimize-css-editor" class="invisible-button minimize-button" data-editor-type="css">
Minimize CSS Editor
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="fold-all-css" class="invisible-button fold-all-button" data-editor-type="css">
Fold All
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="unfold-all-css" class="invisible-button unfold-all-button" data-editor-type="css">
Unfold All
</button>
</li>
</ul>
</div>
</div>
<div class="code-wrap">
<pre id="css" class="code-box" aria-labeledby="css-editor-title">
              <code>
                body {
  background: #e8e8e8;
}

.container {
  margin: 0 auto;
}


/* Example wrapper */

.wrap {
  position: relative;
  margin: 3em 0;
}


/* Frame */

.frame {
  height: 250px;
  line-height: 250px;
  overflow: hidden;
}

.frame ul {
  list-style: none;
  margin: 0;
  padding: 0;
  height: 100%;
  font-size: 50px;
}

.frame ul li {
  float: left;
  width: 227px;
  height: 100%;
  margin: 0 1px 0 0;
  padding: 0;
  background: #333;
  color: #ddd;
  text-align: center;
  cursor: pointer;
}

.frame ul li.active {
  color: #fff;
  background: #a03232;
}


/* Scrollbar */

.scrollbar {
  margin: 0 0 1em 0;
  height: 2px;
  background: #ccc;
  line-height: 0;
}

.scrollbar .handle {
  width: 100px;
  height: 100%;
  background: #292a33;
  cursor: pointer;
}

.scrollbar .handle .mousearea {
  position: absolute;
  top: -9px;
  left: 0;
  width: 100%;
  height: 20px;
}


/* Pages */

.pages {
  list-style: none;
  margin: 20px 0;
  padding: 0;
  text-align: center;
}

.pages li {
  display: inline-block;
  width: 14px;
  height: 14px;
  margin: 0 4px;
  text-indent: -999px;
  border-radius: 10px;
  cursor: pointer;
  overflow: hidden;
  background: #fff;
  box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .2);
}

.pages li:hover {
  background: #aaa;
}

.pages li.active {
  background: #666;
}


/* Controls */

.controls {
  margin: 25px 0;
  text-align: center;
}


/* One Item Per Frame example*/

.oneperframe {
  height: 300px;
  line-height: 300px;
}

.oneperframe ul li {
  width: 1140px;
}

.oneperframe ul li.active {
  background: #333;
}


/* Crazy example */

.crazy ul li:nth-child(2n) {
  width: 100px;
  margin: 0 4px 0 20px;
}

.crazy ul li:nth-child(3n) {
  width: 300px;
  margin: 0 10px 0 5px;
}

.crazy ul li:nth-child(4n) {
  width: 400px;
  margin: 0 30px 0 2px;
}
              </code>
            </pre>
<div class="error-bar" id="error-bar-css">
<span class="error-icon" data-type="css">
!
</span>
</div>
 </div>
</div>
<div class="editor-resizer js-editor-resizer" title="Double-click to expand."></div>
<div id="box-js" class="box box-js" data-type="js">
<div class="powers">
<div class="powers-drag-handle" title="Double-click to expand."></div>
<div class="editor-actions-left">
<button id="settings-pane-js" class="button button-medium mini-button settings-nub" data-type="js" title="Open JS Settings">
<svg class="icon-gear" width="10" height="10">
<use xlink:href="/svg_sprite?v=9637ff09#gear"></use>
</svg>
</button>
<h2 class="box-title js-editor-title" id="js-editor-title">
<span class="box-title-name">
JS
</span>
<span class="box-title-preprocessor-name "></span>
</h2>
</div>
<div class="editor-actions-right">
<div class="collaborators-indicators"></div>
<button class="button mini-button button-medium editor-dropdown-button editor-dropdown-button-js" data-dropdown="#editor-dropdown-js" aria-haspopup="true" aria-expanded="false">
<span class="visually-hidden">
JS Options
</span>
<svg class="icon-arrow-down-mini" width="10" height="10">
<use xlink:href="/svg_sprite?v=9637ff09#arrow-down-mini"></use>
</svg>
</button>
<ul id="editor-dropdown-js" class="link-list is-dropdown editor-dropdown editor-dropdown-js" data-dropdown-position="css" data-dropdown-type="js">
<li class="editor-dropdown-list-item">
<button id="tidy-js" class="invisible-button tidy-code-button" data-editor-type="js">
Format JavaScript
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="view-compiled-js" class="invisible-button view-compiled-button" data-editor-type="js">
View Compiled JavaScript
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="analyze-js" class="invisible-button analyze-button" data-editor-type="js">
Analyze JavaScript
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="maximize-js-editor" class="invisible-button maximize-button" data-editor-type="js">
Maximize JavaScript Editor
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="minimize-js-editor" class="invisible-button minimize-button" data-editor-type="js">
Minimize JavaScript Editor
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="fold-all-js" class="invisible-button fold-all-button" data-editor-type="js">
Fold All
</button>
</li>
<li class="editor-dropdown-list-item">
<button id="unfold-all-js" class="invisible-button unfold-all-button" data-editor-type="js">
Unfold All
</button>
</li>
</ul>
</div>
</div>
<div class="code-wrap">
<pre id="js" class="code-box" aria-labeledby="js-editor-title">
              <code>
                jQuery(function($) {
  &#39;use strict&#39;;

  // -------------------------------------------------------------
  //   Basic Navigation
  // -------------------------------------------------------------
  (function() {
    var $frame = $(&#39;#basic&#39;);
    var $slidee = $frame.children(&#39;ul&#39;).eq(0);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: &#39;basic&#39;,
      smart: 1,
      activateOn: &#39;click&#39;,
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 3,
      scrollBar: $wrap.find(&#39;.scrollbar&#39;),
      scrollBy: 1,
      pagesBar: $wrap.find(&#39;.pages&#39;),
      activatePageOn: &#39;click&#39;,
      speed: 300,
      elasticBounds: 1,
      easing: &#39;easeOutExpo&#39;,
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      forward: $wrap.find(&#39;.forward&#39;),
      backward: $wrap.find(&#39;.backward&#39;),
      prev: $wrap.find(&#39;.prev&#39;),
      next: $wrap.find(&#39;.next&#39;),
      prevPage: $wrap.find(&#39;.prevPage&#39;),
      nextPage: $wrap.find(&#39;.nextPage&#39;)
    });

    // To Start button
    $wrap.find(&#39;.toStart&#39;).on(&#39;click&#39;, function() {
      var item = $(this).data(&#39;item&#39;);
      // Animate a particular item to the start of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly(&#39;toStart&#39;, item);
    });

    // To Center button
    $wrap.find(&#39;.toCenter&#39;).on(&#39;click&#39;, function() {
      var item = $(this).data(&#39;item&#39;);
      // Animate a particular item to the center of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly(&#39;toCenter&#39;, item);
    });

    // To End button
    $wrap.find(&#39;.toEnd&#39;).on(&#39;click&#39;, function() {
      var item = $(this).data(&#39;item&#39;);
      // Animate a particular item to the end of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly(&#39;toEnd&#39;, item);
    });

    // Add item
    $wrap.find(&#39;.add&#39;).on(&#39;click&#39;, function() {
      $frame.sly(&#39;add&#39;, &#39;&lt;li&gt;&#39; + $slidee.children().length + &#39;&lt;/li&gt;&#39;);
    });

    // Remove item
    $wrap.find(&#39;.remove&#39;).on(&#39;click&#39;, function() {
      $frame.sly(&#39;remove&#39;, -1);
    });
  }());

  // -------------------------------------------------------------
  //   Centered Navigation
  // -------------------------------------------------------------
  (function() {
    var $frame = $(&#39;#centered&#39;);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: &#39;centered&#39;,
      smart: 1,
      activateOn: &#39;click&#39;,
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 4,
      scrollBar: $wrap.find(&#39;.scrollbar&#39;),
      scrollBy: 1,
      speed: 300,
      elasticBounds: 1,
      easing: &#39;easeOutExpo&#39;,
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      prev: $wrap.find(&#39;.prev&#39;),
      next: $wrap.find(&#39;.next&#39;)
    });
  }());

  // -------------------------------------------------------------
  //   Force Centered Navigation
  // -------------------------------------------------------------
  (function() {
    var $frame = $(&#39;#forcecentered&#39;);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: &#39;forceCentered&#39;,
      smart: 1,
      activateMiddle: 1,
      activateOn: &#39;click&#39;,
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 0,
      scrollBar: $wrap.find(&#39;.scrollbar&#39;),
      scrollBy: 1,
      speed: 300,
      elasticBounds: 1,
      easing: &#39;easeOutExpo&#39;,
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      prev: $wrap.find(&#39;.prev&#39;),
      next: $wrap.find(&#39;.next&#39;)
    });
  }());

  // -------------------------------------------------------------
  //   Cycle By Items
  // -------------------------------------------------------------
  (function() {
    var $frame = $(&#39;#cycleitems&#39;);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: &#39;basic&#39;,
      smart: 1,
      activateOn: &#39;click&#39;,
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 0,
      scrollBar: $wrap.find(&#39;.scrollbar&#39;),
      scrollBy: 1,
      speed: 300,
      elasticBounds: 1,
      easing: &#39;easeOutExpo&#39;,
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Cycling
      cycleBy: &#39;items&#39;,
      cycleInterval: 1000,
      pauseOnHover: 1,

      // Buttons
      prev: $wrap.find(&#39;.prev&#39;),
      next: $wrap.find(&#39;.next&#39;)
    });

    // Pause button
    $wrap.find(&#39;.pause&#39;).on(&#39;click&#39;, function() {
      $frame.sly(&#39;pause&#39;);
    });

    // Resume button
    $wrap.find(&#39;.resume&#39;).on(&#39;click&#39;, function() {
      $frame.sly(&#39;resume&#39;);
    });

    // Toggle button
    $wrap.find(&#39;.toggle&#39;).on(&#39;click&#39;, function() {
      $frame.sly(&#39;toggle&#39;);
    });
  }());

  // -------------------------------------------------------------
  //   Cycle By Pages
  // -------------------------------------------------------------
  (function() {
    var $frame = $(&#39;#cyclepages&#39;);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: &#39;basic&#39;,
      smart: 1,
      activateOn: &#39;click&#39;,
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 0,
      scrollBar: $wrap.find(&#39;.scrollbar&#39;),
      scrollBy: 1,
      pagesBar: $wrap.find(&#39;.pages&#39;),
      activatePageOn: &#39;click&#39;,
      speed: 300,
      elasticBounds: 1,
      easing: &#39;easeOutExpo&#39;,
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Cycling
      cycleBy: &#39;pages&#39;,
      cycleInterval: 1000,
      pauseOnHover: 1,
      startPaused: 1,

      // Buttons
      prevPage: $wrap.find(&#39;.prevPage&#39;),
      nextPage: $wrap.find(&#39;.nextPage&#39;)
    });

    // Pause button
    $wrap.find(&#39;.pause&#39;).on(&#39;click&#39;, function() {
      $frame.sly(&#39;pause&#39;);
    });

    // Resume button
    $wrap.find(&#39;.resume&#39;).on(&#39;click&#39;, function() {
      $frame.sly(&#39;resume&#39;);
    });

    // Toggle button
    $wrap.find(&#39;.toggle&#39;).on(&#39;click&#39;, function() {
      $frame.sly(&#39;toggle&#39;);
    });
  }());

  // -------------------------------------------------------------
  //   One Item Per Frame
  // -------------------------------------------------------------
  (function() {
    var $frame = $(&#39;#oneperframe&#39;);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: &#39;forceCentered&#39;,
      smart: 1,
      activateMiddle: 1,
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 0,
      scrollBar: $wrap.find(&#39;.scrollbar&#39;),
      scrollBy: 1,
      speed: 300,
      elasticBounds: 1,
      easing: &#39;easeOutExpo&#39;,
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      prev: $wrap.find(&#39;.prev&#39;),
      next: $wrap.find(&#39;.next&#39;)
    });
  }());

  // -------------------------------------------------------------
  //   Crazy
  // -------------------------------------------------------------
  (function() {
    var $frame = $(&#39;#crazy&#39;);
    var $slidee = $frame.children(&#39;ul&#39;).eq(0);
    var $wrap = $frame.parent();

    // Call Sly on frame
    $frame.sly({
      horizontal: 1,
      itemNav: &#39;basic&#39;,
      smart: 1,
      activateOn: &#39;click&#39;,
      mouseDragging: 1,
      touchDragging: 1,
      releaseSwing: 1,
      startAt: 3,
      scrollBar: $wrap.find(&#39;.scrollbar&#39;),
      scrollBy: 1,
      pagesBar: $wrap.find(&#39;.pages&#39;),
      activatePageOn: &#39;click&#39;,
      speed: 300,
      elasticBounds: 1,
      easing: &#39;easeOutExpo&#39;,
      dragHandle: 1,
      dynamicHandle: 1,
      clickBar: 1,

      // Buttons
      forward: $wrap.find(&#39;.forward&#39;),
      backward: $wrap.find(&#39;.backward&#39;),
      prev: $wrap.find(&#39;.prev&#39;),
      next: $wrap.find(&#39;.next&#39;),
      prevPage: $wrap.find(&#39;.prevPage&#39;),
      nextPage: $wrap.find(&#39;.nextPage&#39;)
    });

    // To Start button
    $wrap.find(&#39;.toStart&#39;).on(&#39;click&#39;, function() {
      var item = $(this).data(&#39;item&#39;);
      // Animate a particular item to the start of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly(&#39;toStart&#39;, item);
    });

    // To Center button
    $wrap.find(&#39;.toCenter&#39;).on(&#39;click&#39;, function() {
      var item = $(this).data(&#39;item&#39;);
      // Animate a particular item to the center of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly(&#39;toCenter&#39;, item);
    });

    // To End button
    $wrap.find(&#39;.toEnd&#39;).on(&#39;click&#39;, function() {
      var item = $(this).data(&#39;item&#39;);
      // Animate a particular item to the end of the frame.
      // If no item is provided, the whole content will be animated.
      $frame.sly(&#39;toEnd&#39;, item);
    });

    // Add item
    $wrap.find(&#39;.add&#39;).on(&#39;click&#39;, function() {
      $frame.sly(&#39;add&#39;, &#39;&lt;li&gt;&#39; + $slidee.children().length + &#39;&lt;/li&gt;&#39;);
    });

    // Remove item
    $wrap.find(&#39;.remove&#39;).on(&#39;click&#39;, function() {
      $frame.sly(&#39;remove&#39;, -1);
    });
  }());
});
              </code>
            </pre>
<div class="error-bar" id="error-bar-js">
<span class="error-icon" data-type="js">
!
</span>
</div>
</div>
</div>
</div>
<div id="resizer" class="resizer"><span></span><div id="width-readout" class="width-readout">999px</div></div>
<section id="drawer" class="drawer comments">
</section>
<div class="output-container">
<div class="output-sizer">
<div id="result_div" class="result">
<iframe id="result" name="CodePen" src="https://cdpn.io/ritz078/fullpage/bEYOov" sandbox="allow-forms allow-modals allow-pointer-lock allow-popups allow-presentation allow-same-origin allow-scripts" allow="accelerometer; ambient-light-sensor; camera; encrypted-media; geolocation; gyroscope; microphone; midi; payment; vr" scrolling="auto" allowTransparency="true" allowpaymentrequest="true" allowfullscreen="true" class="result-iframe ">
          </iframe>
<div id="editor-drag-cover" class="drag-cover"></div>
</div>
<div id="box-console" class="box box-console">
<div class="editor-resizer editor-resizer-console" title="Drag to resize. Double-click to expand."></div>
<div class="powers">
<div class="powers-drag-handle" title="Drag to resize. Double-click to expand."></div>
<div class="editor-actions-left">
<h2 class="box-title"><span class="box-title-name">Console</span></h2>
</div>
<div class="editor-actions-right">
<button class="button button-medium mini-button console-clear-button" title="Clear">
Clear
</button>
<button class="button button-medium mini-button close-editor-button" data-type="console" title="Close">
<svg class="icon-x">
<use xlink:href="/svg_sprite?v=9637ff09#x"></use>
</svg>
</button>
</div>
</div>
<div class="console-wrap">
<div class="console-entries short-no-scroll"></div>
<div class="console-command-line">
<span class="console-arrow forwards"></span>
<textarea class="console-command-line-input auto-expand" rows="1" data-min-rows="1"></textarea>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="asset-bin-goes-here"></div>
<footer id="react-pen-footer" class="site-footer editor-footer"></footer>
<div id="keycommands" class="modal modal-neutral">
<div class="keycommands-container">
<section class="editor-commands" style="padding-right: 10px;">
<h2>Editor Commands</h2>
<div class="key-group">
<kbd class="keycommand">
<span class="key pc_only">Ctrl</span>
<span class="key mac_only">Ctrl</span>
<span class="key">Space</span>
</kbd>
Autocomplete
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key">F</span>
</kbd>
Find
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key">G</span>
</kbd>
Find Next
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key" title="Shift">⇧</span>
<span class="key">G</span>
</kbd>
Find Previous
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key pc_only" title="Shift">⇧</span>
<span class="key mac_only">Opt</span>
<span class="key">F</span>
</kbd>
Find & Replace
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key" title="Shift">⇧</span>
<span class="key">F</span>
</kbd>
Format Code
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key">[</span>
</kbd>
Indent Code Right
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key">]</span>
</kbd>
Indent Code Left
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key" title="Shift">⇧</span>
<span class="key">Tab</span>
</kbd>
Auto Indent Code
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key">/</span>
</kbd>
Line Comment
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key pc_only" title="Shift">⇧</span>
<span class="key mac_only">Opt</span>
<span class="key">/</span>
</kbd>
Block Comment
</div>
<p style="margin: 20px 0 0 0;">Also see: <a href="https://blog.codepen.io/documentation/features/tab-triggers/" target="_blank" rel="noopener">Tab Triggers</a></p>
</section>
<section class="editor-commands">
<h2>Editor Focus</h2>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key pc_only">Alt</span>
<span class="key mac_only">Opt</span>
<span class="key">1</span>
</kbd>
HTML Editor
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key pc_only">Alt</span>
<span class="key mac_only">Opt</span>
<span class="key">2</span>
</kbd>
CSS Editor
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key pc_only">Alt</span>
<span class="key mac_only">Opt</span>
<span class="key">3</span>
</kbd>
JS Editor
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key pc_only">Alt</span>
<span class="key mac_only">Opt</span>
<span class="key">4</span>
</kbd>
Toggle Console
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key pc_only">Alt</span>
<span class="key mac_only">Opt</span>
<span class="key">0</span>
</kbd>
Preview
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key">Esc</span>
</kbd>
Exit currently focused editor
</div>
</section>
<section class="editor-commands">
<h2>Misc</h2>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key" title="Shift">⇧</span>
<span class="key">7</span>
</kbd>
Re-run Preview
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key" title="Shift">⇧</span>
<span class="key">8</span>
</kbd>
Clear All Analyze Errors
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key" title="Shift">⇧</span>
<span class="key">9</span>
</kbd>
Open This Dialog
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key" title="Shift">⇧</span>
<span class="key">0</span>
</kbd>
Open Debug View
</div>
<h2>HTML Specific</h2>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key" title="Shift">⇧</span>
<span class="key">A</span>
</kbd>
Wrap With...
</div>
<h2>Pen Actions</h2>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key">P</span>
</kbd>
Create New Pen
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key">S</span>
</kbd>
Save
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key" title="Shift">⇧</span>
<span class="key">S</span>
</kbd>
Save As Private <span class="badge badge-pro">PRO</span>
</div>
<div class="key-group">
<kbd class="keycommand">
<span class="key -command"></span>
<span class="key">I</span>
</kbd>
Info Panel (if owned)
</div>
</section>
</div>
</div>
<div id="popup-overlay" class="overlay popup-overlay"></div>
<div id="modal-overlay" class="overlay modal-overlay"></div>
<div id="react-popups" class="react-popups"></div>
<noscript>

  <input type="checkbox" class="modal-closing-trick" id="modal-closing-trick">

  <div class="overlay noscript-overlay" style="display: block;"></div>

  <div class="modal modal-message group modal-warning">

    <div class="modal-title">CodePen requires JavaScript to render the code and preview areas in this view.</div>

    <p>Trying <a href="https://codepen.io/ritz078/debug/bEYOov">viewing this Pen in Debug Mode</a>, which is the preview area without any iframe and does not require JavaScript. Although what the preview is of might!</p>

    <p>Need to know how to enable JavaScript? <a href="http://enable-javascript.com/" target="_blank" rel="noopener">Go here.</a></p>

    <label class="button button-medium" for="modal-closing-trick">Close this, use anyway.</label>

  </div>

</noscript>
<input type="hidden" id="init-data" value="{&quot;__browser&quot;:{&quot;device&quot;:&quot;unknown&quot;,&quot;mobile&quot;:null,&quot;name&quot;:&quot;chrome&quot;,&quot;platform&quot;:&quot;pc&quot;,&quot;version&quot;:&quot;81&quot;},&quot;__analytics&quot;:{&quot;controllerActionName&quot;:&quot;show&quot;,&quot;controllerName&quot;:&quot;pen&quot;,&quot;enabled&quot;:true},&quot;__remote_addr&quot;:&quot;159.192.189.47&quot;,&quot;__CPDATA&quot;:{&quot;domain_iframe&quot;:&quot;https://cdpn.io&quot;,&quot;host&quot;:&quot;codepen.io&quot;,&quot;iframe_allow&quot;:&quot;accelerometer; ambient-light-sensor; camera; encrypted-media; geolocation; gyroscope; microphone; midi; payment; vr&quot;,&quot;iframe_sandbox&quot;:&quot;allow-forms allow-modals allow-pointer-lock allow-popups allow-presentation allow-same-origin allow-scripts&quot;},&quot;__env&quot;:&quot;production&quot;,&quot;__turnOffJS&quot;:false,&quot;__constants&quot;:{&quot;grid_iframe_sandbox_attributes&quot;:&quot;allow-scripts allow-pointer-lock allow-same-origin&quot;},&quot;__svg_sprite&quot;:&quot;/svg_sprite?v=9637ff09&quot;,&quot;__stream_analytics&quot;:{&quot;api_key&quot;:&quot;64puhuch8n2j&quot;,&quot;token&quot;:&quot;eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJyZXNvdXJjZSI6ImFuYWx5dGljcyIsImFjdGlvbiI6IioiLCJ1c2VyX2lkIjoiKiJ9.K-TP9-k-_ZnktGVf_CxDVZyUXKzGMFVJ--dNJ-20_t4&quot;},&quot;__user&quot;:{&quot;anon&quot;:true,&quot;base_url&quot;:&quot;/anon/&quot;,&quot;current_team_id&quot;:0,&quot;current_team_hashid&quot;:&quot;YdEzGn&quot;,&quot;hashid&quot;:&quot;VoDkNZ&quot;,&quot;id&quot;:1,&quot;itemType&quot;:&quot;user&quot;,&quot;name&quot;:&quot;Captain Anonymous&quot;,&quot;owner_id&quot;:&quot;VoDkNZYdEzGn&quot;,&quot;paid&quot;:false,&quot;tier&quot;:0,&quot;username&quot;:&quot;anon&quot;},&quot;__firestore&quot;:{&quot;config&quot;:{&quot;apiKey&quot;:&quot;AIzaSyBgLAe7N_MdFpuVofMkcQLGwwhUu5tuxls&quot;,&quot;authDomain&quot;:&quot;codepen-store-production.firebaseapp.com&quot;,&quot;databaseURL&quot;:&quot;https://codepen-store-production.firebaseio.com&quot;,&quot;disabled&quot;:false,&quot;projectId&quot;:&quot;codepen-store-production&quot;},&quot;token&quot;:&quot;eyJhbGciOiJSUzI1NiJ9.eyJhdWQiOiJodHRwczovL2lkZW50aXR5dG9vbGtpdC5nb29nbGVhcGlzLmNvbS9nb29nbGUuaWRlbnRpdHkuaWRlbnRpdHl0b29sa2l0LnYxLklkZW50aXR5VG9vbGtpdCIsImNsYWltcyI6eyJvd25lcklkIjoiVm9Ea05aWWRFekduIiwiYWRtaW4iOmZhbHNlfSwiZXhwIjoxNTg3NTQ5NzE0LCJpYXQiOjE1ODc1NDYxMTQsImlzcyI6ImZpcmViYXNlLWFkbWluc2RrLThva3lsQGNvZGVwZW4tc3RvcmUtcHJvZHVjdGlvbi5pYW0uZ3NlcnZpY2VhY2NvdW50LmNvbSIsInN1YiI6ImZpcmViYXNlLWFkbWluc2RrLThva3lsQGNvZGVwZW4tc3RvcmUtcHJvZHVjdGlvbi5pYW0uZ3NlcnZpY2VhY2NvdW50LmNvbSIsInVpZCI6IlZvRGtOWiJ9.wO249Fgsjf6Dvb9nJl2CrPcCnoZABUXWU2Pw4FkC9-i9h85ueIYboZwaVYyUfQT1popsO3mojj3uiKY7PdcHJuxAFruaFfTcP1ZDPhpkkfoaIOaNw89b5ZJmQ4RDLZjZAaf0hIT3W4aVBCImQMv6wRom7FwwB7EqtL19uAz1qGevyXxR43H87m_Mcydsf-tdp3_hwSONxx_BnhhLe_Grm6TZotfnZQ3jL85Z-02hPEMaQKPoam8JE1sZa7Ua-jvZ8W4Lse06Y2v9ni6xzbWYvPrXf8hrmW48O61sPXot66cMfHCVY1PG7kIbkHWazzqc06pL-RAO-pcVitnt8X8RLg&quot;},&quot;__graphql&quot;:{&quot;data&quot;:{&quot;sessionUser&quot;:{&quot;id&quot;:&quot;VoDkNZ&quot;,&quot;name&quot;:&quot;Captain Anonymous&quot;,&quot;avatar80&quot;:&quot;https://static.codepen.io/assets/avatars/user-avatar-80x80-bdcd44a3bfb9a5fd01eb8b86f9e033fa1a9897c3a15b33adfc2649a002dab1b6.png&quot;,&quot;avatar512&quot;:&quot;https://static.codepen.io/assets/avatars/user-avatar-512x512-6e240cf350d2f1cc07c2bed234c3a3bb5f1b237023c204c782622e80d6b212ba.png&quot;,&quot;canCreatePosts&quot;:false,&quot;currentContext&quot;:{&quot;id&quot;:&quot;VoDkNZ&quot;,&quot;baseUrl&quot;:&quot;/anon&quot;,&quot;title&quot;:&quot;Captain Anonymous&quot;,&quot;name&quot;:&quot;Captain Anonymous&quot;,&quot;avatar80&quot;:&quot;https://static.codepen.io/assets/avatars/user-avatar-80x80-bdcd44a3bfb9a5fd01eb8b86f9e033fa1a9897c3a15b33adfc2649a002dab1b6.png&quot;,&quot;avatar512&quot;:&quot;https://static.codepen.io/assets/avatars/user-avatar-512x512-6e240cf350d2f1cc07c2bed234c3a3bb5f1b237023c204c782622e80d6b212ba.png&quot;,&quot;username&quot;:&quot;anon&quot;,&quot;contextType&quot;:&quot;USER&quot;,&quot;projectLimitations&quot;:{&quot;projects&quot;:0,&quot;usedProjects&quot;:0,&quot;__typename&quot;:&quot;ProjectLimitations&quot;},&quot;privateByDefault&quot;:false,&quot;__typename&quot;:&quot;User&quot;},&quot;currentTeamId&quot;:null,&quot;baseUrl&quot;:&quot;/anon&quot;,&quot;username&quot;:&quot;anon&quot;,&quot;admin&quot;:false,&quot;anon&quot;:true,&quot;pro&quot;:false,&quot;verified&quot;:true,&quot;teams&quot;:[],&quot;permissions&quot;:{&quot;canCreatePrivate&quot;:false,&quot;canUploadAssets&quot;:false,&quot;__typename&quot;:&quot;UserPermissions&quot;},&quot;__typename&quot;:&quot;User&quot;}}},&quot;__boomboom&quot;:{&quot;serve_url&quot;:&quot;https://cdpn.io/boomboom/v2/index.html&quot;,&quot;store_url&quot;:&quot;https://cdpn.io/boomboom/v2/store&quot;},&quot;__editor_config&quot;:{&quot;id&quot;:&quot;classic&quot;,&quot;editors&quot;:[{&quot;id&quot;:&quot;html&quot;,&quot;type&quot;:&quot;html&quot;,&quot;name&quot;:&quot;HTML&quot;,&quot;showEditor&quot;:true,&quot;showSettings&quot;:true,&quot;showProcessors&quot;:true,&quot;embeds&quot;:{&quot;showViewCompiled&quot;:true},&quot;settings&quot;:[{&quot;id&quot;:&quot;processor&quot;,&quot;name&quot;:&quot;HTML Preprocessor&quot;,&quot;type&quot;:&quot;select&quot;,&quot;visible&quot;:true,&quot;values&quot;:[{&quot;id&quot;:&quot;none&quot;,&quot;name&quot;:&quot;None&quot;,&quot;value&quot;:&quot;none&quot;,&quot;default&quot;:true},{&quot;id&quot;:&quot;haml&quot;,&quot;name&quot;:&quot;Haml&quot;,&quot;value&quot;:&quot;haml&quot;},{&quot;id&quot;:&quot;markdown&quot;,&quot;name&quot;:&quot;Markdown&quot;,&quot;value&quot;:&quot;markdown&quot;},{&quot;id&quot;:&quot;slim&quot;,&quot;name&quot;:&quot;Slim&quot;,&quot;value&quot;:&quot;slim&quot;},{&quot;id&quot;:&quot;pug&quot;,&quot;name&quot;:&quot;Pug&quot;,&quot;value&quot;:&quot;pug&quot;}]},{&quot;id&quot;:&quot;html_classes&quot;,&quot;name&quot;:&quot;Add Class(es) to &lt;html&gt;&quot;,&quot;type&quot;:&quot;input&quot;,&quot;placeholder&quot;:&quot;e.g. single post post-1234&quot;,&quot;visible&quot;:true},{&quot;id&quot;:&quot;head&quot;,&quot;name&quot;:&quot;Stuff for &lt;head&gt;&quot;,&quot;type&quot;:&quot;textarea&quot;,&quot;placeholder&quot;:&quot;e.g. &lt;meta&gt;, &lt;link&gt;, &lt;script&gt;&quot;,&quot;visible&quot;:true}],&quot;actions&quot;:[{&quot;id&quot;:&quot;tidy_html&quot;,&quot;type&quot;:&quot;tidy_code&quot;,&quot;name&quot;:&quot;Format HTML&quot;,&quot;disabled_processors&quot;:[&quot;haml&quot;,&quot;slim&quot;]},{&quot;id&quot;:&quot;view_compiled_html&quot;,&quot;type&quot;:&quot;view_compiled&quot;,&quot;name&quot;:&quot;View Compiled HTML&quot;,&quot;disabled_processors&quot;:[&quot;none&quot;],&quot;showInEmbeds&quot;:true},{&quot;id&quot;:&quot;analyze_html&quot;,&quot;type&quot;:&quot;analyze&quot;,&quot;name&quot;:&quot;Analyze HTML&quot;},{&quot;id&quot;:&quot;maximize_html_editor&quot;,&quot;type&quot;:&quot;maximize&quot;,&quot;name&quot;:&quot;Maximize HTML Editor&quot;},{&quot;id&quot;:&quot;minimize_html_editor&quot;,&quot;type&quot;:&quot;minimize&quot;,&quot;name&quot;:&quot;Minimize HTML Editor&quot;},{&quot;id&quot;:&quot;fold_all_html&quot;,&quot;type&quot;:&quot;fold_all&quot;,&quot;name&quot;:&quot;Fold All&quot;},{&quot;id&quot;:&quot;unfold_all_html&quot;,&quot;type&quot;:&quot;unfold_all&quot;,&quot;name&quot;:&quot;Unfold All&quot;}],&quot;processors&quot;:[{&quot;id&quot;:&quot;none&quot;,&quot;name&quot;:&quot;None&quot;},{&quot;id&quot;:&quot;haml&quot;,&quot;name&quot;:&quot;Haml&quot;},{&quot;id&quot;:&quot;markdown&quot;,&quot;name&quot;:&quot;Markdown&quot;},{&quot;id&quot;:&quot;slim&quot;,&quot;name&quot;:&quot;Slim&quot;},{&quot;id&quot;:&quot;pug&quot;,&quot;name&quot;:&quot;Pug&quot;}]},{&quot;id&quot;:&quot;css&quot;,&quot;type&quot;:&quot;css&quot;,&quot;name&quot;:&quot;CSS&quot;,&quot;showEditor&quot;:true,&quot;showSettings&quot;:true,&quot;showProcessors&quot;:true,&quot;showVendorPrefixing&quot;:true,&quot;embeds&quot;:{&quot;showViewCompiled&quot;:true},&quot;actions&quot;:[{&quot;id&quot;:&quot;tidy_css&quot;,&quot;type&quot;:&quot;tidy_code&quot;,&quot;name&quot;:&quot;Format CSS&quot;,&quot;disabled_processors&quot;:[&quot;sass&quot;,&quot;stylus&quot;]},{&quot;id&quot;:&quot;view_compiled_css&quot;,&quot;type&quot;:&quot;view_compiled&quot;,&quot;name&quot;:&quot;View Compiled CSS&quot;,&quot;disabled_processors&quot;:[&quot;none&quot;]},{&quot;id&quot;:&quot;analyze_css&quot;,&quot;type&quot;:&quot;analyze&quot;,&quot;name&quot;:&quot;Analyze CSS&quot;},{&quot;id&quot;:&quot;maximize_css_editor&quot;,&quot;type&quot;:&quot;maximize&quot;,&quot;name&quot;:&quot;Maximize CSS Editor&quot;},{&quot;id&quot;:&quot;minimize_css_editor&quot;,&quot;type&quot;:&quot;minimize&quot;,&quot;name&quot;:&quot;Minimize CSS Editor&quot;},{&quot;id&quot;:&quot;fold_all_css&quot;,&quot;type&quot;:&quot;fold_all&quot;,&quot;name&quot;:&quot;Fold All&quot;,&quot;disabled_processors&quot;:[&quot;sass&quot;]},{&quot;id&quot;:&quot;unfold_all_css&quot;,&quot;type&quot;:&quot;unfold_all&quot;,&quot;name&quot;:&quot;Unfold All&quot;,&quot;disabled_processors&quot;:[&quot;sass&quot;]}],&quot;processors&quot;:[{&quot;id&quot;:&quot;none&quot;,&quot;name&quot;:&quot;None&quot;},{&quot;id&quot;:&quot;less&quot;,&quot;name&quot;:&quot;Less&quot;},{&quot;id&quot;:&quot;scss&quot;,&quot;name&quot;:&quot;SCSS&quot;},{&quot;id&quot;:&quot;sass&quot;,&quot;name&quot;:&quot;Sass&quot;},{&quot;id&quot;:&quot;stylus&quot;,&quot;name&quot;:&quot;Stylus&quot;},{&quot;id&quot;:&quot;postcss&quot;,&quot;name&quot;:&quot;PostCSS&quot;}],&quot;parSuffixes&quot;:[&quot;less&quot;,&quot;scss&quot;,&quot;sass&quot;,&quot;styl&quot;]},{&quot;id&quot;:&quot;js&quot;,&quot;type&quot;:&quot;js&quot;,&quot;name&quot;:&quot;JS&quot;,&quot;showEditor&quot;:true,&quot;showSettings&quot;:true,&quot;showProcessors&quot;:true,&quot;externalResourcesHidden&quot;:false,&quot;embeds&quot;:{&quot;showViewCompiled&quot;:true},&quot;actions&quot;:[{&quot;id&quot;:&quot;tidy_js&quot;,&quot;type&quot;:&quot;tidy_code&quot;,&quot;name&quot;:&quot;Format JavaScript&quot;,&quot;disabled_processors&quot;:[&quot;coffeescript, livescript&quot;]},{&quot;id&quot;:&quot;view_compiled_js&quot;,&quot;type&quot;:&quot;view_compiled&quot;,&quot;name&quot;:&quot;View Compiled JavaScript&quot;,&quot;disabled_processors&quot;:[&quot;none&quot;]},{&quot;id&quot;:&quot;analyze_js&quot;,&quot;type&quot;:&quot;analyze&quot;,&quot;name&quot;:&quot;Analyze JavaScript&quot;},{&quot;id&quot;:&quot;maximize_js_editor&quot;,&quot;type&quot;:&quot;maximize&quot;,&quot;name&quot;:&quot;Maximize JavaScript Editor&quot;},{&quot;id&quot;:&quot;minimize_js_editor&quot;,&quot;type&quot;:&quot;minimize&quot;,&quot;name&quot;:&quot;Minimize JavaScript Editor&quot;},{&quot;id&quot;:&quot;fold_all_js&quot;,&quot;type&quot;:&quot;fold_all&quot;,&quot;name&quot;:&quot;Fold All&quot;},{&quot;id&quot;:&quot;unfold_all_js&quot;,&quot;type&quot;:&quot;unfold_all&quot;,&quot;name&quot;:&quot;Unfold All&quot;}],&quot;processors&quot;:[{&quot;id&quot;:&quot;none&quot;,&quot;name&quot;:&quot;None&quot;},{&quot;id&quot;:&quot;babel&quot;,&quot;name&quot;:&quot;Babel&quot;},{&quot;id&quot;:&quot;typescript&quot;,&quot;name&quot;:&quot;TypeScript&quot;},{&quot;id&quot;:&quot;coffeescript&quot;,&quot;name&quot;:&quot;CoffeeScript&quot;},{&quot;id&quot;:&quot;livescript&quot;,&quot;name&quot;:&quot;LiveScript&quot;}]}],&quot;formatters&quot;:[{&quot;id&quot;:&quot;classic&quot;,&quot;name&quot;:&quot;Classic&quot;,&quot;runOn&quot;:[{&quot;eventType&quot;:&quot;demand&quot;}],&quot;url&quot;:&quot;https://fi593g2v2a.execute-api.us-west-2.amazonaws.com/production/format&quot;}],&quot;layout&quot;:{&quot;default&quot;:&quot;top&quot;},&quot;linters&quot;:[{&quot;id&quot;:&quot;classic&quot;,&quot;name&quot;:&quot;Classic&quot;,&quot;runOn&quot;:[{&quot;eventType&quot;:&quot;demand&quot;}],&quot;url&quot;:&quot;https://fi593g2v2a.execute-api.us-west-2.amazonaws.com/production/lint&quot;}],&quot;preview&quot;:{&quot;intervalMaxWaitMS&quot;:3500,&quot;intervalMS&quot;:1200},&quot;settings&quot;:[{&quot;id&quot;:&quot;behavior&quot;,&quot;name&quot;:&quot;Behavior&quot;,&quot;type&quot;:&quot;setting&quot;},{&quot;id&quot;:&quot;editor&quot;,&quot;name&quot;:&quot;Editor&quot;,&quot;type&quot;:&quot;setting&quot;}]},&quot;__export_service_url&quot;:&quot;https://codepen.io/api/export&quot;,&quot;__item&quot;:&quot;{\&quot;custom_screenshot\&quot;:null,\&quot;dependencies\&quot;:{},\&quot;editor_settings\&quot;:{\&quot;auto_run\&quot;:true,\&quot;autocomplete\&quot;:false,\&quot;code_folding\&quot;:true,\&quot;css_pre_processor\&quot;:\&quot;none\&quot;,\&quot;css_prefix\&quot;:\&quot;neither\&quot;,\&quot;css_starter\&quot;:\&quot;neither\&quot;,\&quot;emmet_active\&quot;:true,\&quot;font_size\&quot;:\&quot;14\&quot;,\&quot;font_type\&quot;:\&quot;monaco\&quot;,\&quot;format_on_save\&quot;:false,\&quot;html_pre_processor\&quot;:\&quot;none\&quot;,\&quot;indent_with\&quot;:\&quot;spaces\&quot;,\&quot;js_pre_processor\&quot;:\&quot;none\&quot;,\&quot;key_bindings\&quot;:\&quot;normal\&quot;,\&quot;line_numbers\&quot;:true,\&quot;line_wrapping\&quot;:true,\&quot;match_brackets\&quot;:true,\&quot;snippets\&quot;:{\&quot;markupSnippets\&quot;:{},\&quot;stylesheetSnippets\&quot;:{}},\&quot;tab_size\&quot;:\&quot;2\&quot;,\&quot;theme\&quot;:\&quot;twilight\&quot;,\&quot;auto_save\&quot;:true},\&quot;hashid\&quot;:\&quot;bEYOov\&quot;,\&quot;itemType\&quot;:\&quot;pen\&quot;,\&quot;owner_id\&quot;:\&quot;eqNRoOYdEzGn\&quot;,\&quot;resources\&quot;:[{\&quot;url\&quot;:\&quot;https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css\&quot;,\&quot;order\&quot;:0,\&quot;resource_type\&quot;:\&quot;css\&quot;,\&quot;par_content\&quot;:\&quot;\&quot;},{\&quot;url\&quot;:\&quot;https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js\&quot;,\&quot;order\&quot;:0,\&quot;resource_type\&quot;:\&quot;js\&quot;,\&quot;par_content\&quot;:\&quot;\&quot;},{\&quot;url\&quot;:\&quot;https://darsa.in/sly/css/ospb.css\&quot;,\&quot;order\&quot;:1,\&quot;resource_type\&quot;:\&quot;css\&quot;,\&quot;par_content\&quot;:\&quot;\&quot;},{\&quot;url\&quot;:\&quot;https://darsa.in/sly/examples/js/vendor/plugins.js\&quot;,\&quot;order\&quot;:1,\&quot;resource_type\&quot;:\&quot;js\&quot;,\&quot;par_content\&quot;:\&quot;\&quot;},{\&quot;url\&quot;:\&quot;https://cdnjs.cloudflare.com/ajax/libs/Sly/1.6.1/sly.min.js\&quot;,\&quot;order\&quot;:2,\&quot;resource_type\&quot;:\&quot;js\&quot;,\&quot;par_content\&quot;:\&quot;\&quot;}],\&quot;tags\&quot;:[],\&quot;id\&quot;:6533425,\&quot;user_id\&quot;:263076,\&quot;html\&quot;:\&quot;&lt;div class=\\\&quot;wrap\\\&quot;&gt;\\n  &lt;h2&gt;Basic &lt;small&gt;- with all the navigation options enabled&lt;/small&gt;&lt;/h2&gt;\\n\\n  &lt;div class=\\\&quot;scrollbar\\\&quot;&gt;\\n    &lt;div class=\\\&quot;handle\\\&quot;&gt;\\n      &lt;div class=\\\&quot;mousearea\\\&quot;&gt;&lt;/div&gt;\\n    &lt;/div&gt;\\n  &lt;/div&gt;\\n\\n  &lt;div class=\\\&quot;frame\\\&quot; id=\\\&quot;basic\\\&quot;&gt;\\n    &lt;ul class=\\\&quot;clearfix\\\&quot;&gt;\\n      &lt;li&gt;0&lt;/li&gt;\\n      &lt;li&gt;1&lt;/li&gt;\\n      &lt;li&gt;2&lt;/li&gt;\\n      &lt;li&gt;3&lt;/li&gt;\\n      &lt;li&gt;4&lt;/li&gt;\\n      &lt;li&gt;5&lt;/li&gt;\\n      &lt;li&gt;6&lt;/li&gt;\\n      &lt;li&gt;7&lt;/li&gt;\\n      &lt;li&gt;8&lt;/li&gt;\\n      &lt;li&gt;9&lt;/li&gt;\\n      &lt;li&gt;10&lt;/li&gt;\\n      &lt;li&gt;11&lt;/li&gt;\\n      &lt;li&gt;12&lt;/li&gt;\\n      &lt;li&gt;13&lt;/li&gt;\\n      &lt;li&gt;14&lt;/li&gt;\\n      &lt;li&gt;15&lt;/li&gt;\\n      &lt;li&gt;16&lt;/li&gt;\\n      &lt;li&gt;17&lt;/li&gt;\\n      &lt;li&gt;18&lt;/li&gt;\\n      &lt;li&gt;19&lt;/li&gt;\\n      &lt;li&gt;20&lt;/li&gt;\\n      &lt;li&gt;21&lt;/li&gt;\\n      &lt;li&gt;22&lt;/li&gt;\\n      &lt;li&gt;23&lt;/li&gt;\\n      &lt;li&gt;24&lt;/li&gt;\\n      &lt;li&gt;25&lt;/li&gt;\\n      &lt;li&gt;26&lt;/li&gt;\\n      &lt;li&gt;27&lt;/li&gt;\\n      &lt;li&gt;28&lt;/li&gt;\\n      &lt;li&gt;29&lt;/li&gt;\\n    &lt;/ul&gt;\\n  &lt;/div&gt;\\n\\n  &lt;ul class=\\\&quot;pages\\\&quot;&gt;&lt;/ul&gt;\\n\\n  &lt;div class=\\\&quot;controls center\\\&quot;&gt;\\n    &lt;button class=\\\&quot;btn prevPage\\\&quot;&gt;&lt;i class=\\\&quot;icon-chevron-left\\\&quot;&gt;&lt;/i&gt;&lt;i class=\\\&quot;icon-chevron-left\\\&quot;&gt;&lt;/i&gt; page&lt;/button&gt;\\n    &lt;button class=\\\&quot;btn prev\\\&quot;&gt;&lt;i class=\\\&quot;icon-chevron-left\\\&quot;&gt;&lt;/i&gt; item&lt;/button&gt;\\n    &lt;button class=\\\&quot;btn backward\\\&quot;&gt;&lt;i class=\\\&quot;icon-chevron-left\\\&quot;&gt;&lt;/i&gt; move&lt;/button&gt;\\n\\n    &lt;div class=\\\&quot;btn-group\\\&quot;&gt;\\n      &lt;button class=\\\&quot;btn toStart\\\&quot;&gt;toStart&lt;/button&gt;\\n      &lt;button class=\\\&quot;btn toCenter\\\&quot;&gt;toCenter&lt;/button&gt;\\n      &lt;button class=\\\&quot;btn toEnd\\\&quot;&gt;toEnd&lt;/button&gt;\\n    &lt;/div&gt;\\n\\n    &lt;div class=\\\&quot;btn-group\\\&quot;&gt;\\n      &lt;button class=\\\&quot;btn toStart\\\&quot; data-item=\\\&quot;10\\\&quot;&gt;&lt;strong&gt;10&lt;/strong&gt; toStart&lt;/button&gt;\\n      &lt;button class=\\\&quot;btn toCenter\\\&quot; data-item=\\\&quot;10\\\&quot;&gt;&lt;strong&gt;10&lt;/strong&gt; toCenter&lt;/button&gt;\\n      &lt;button class=\\\&quot;btn toEnd\\\&quot; data-item=\\\&quot;10\\\&quot;&gt;&lt;strong&gt;10&lt;/strong&gt; toEnd&lt;/button&gt;\\n    &lt;/div&gt;\\n\\n    &lt;div class=\\\&quot;btn-group\\\&quot;&gt;\\n      &lt;button class=\\\&quot;btn add\\\&quot;&gt;&lt;i class=\\\&quot;icon-plus-sign\\\&quot;&gt;&lt;/i&gt;&lt;/button&gt;\\n      &lt;button class=\\\&quot;btn remove\\\&quot;&gt;&lt;i class=\\\&quot;icon-minus-sign\\\&quot;&gt;&lt;/i&gt;&lt;/button&gt;\\n    &lt;/div&gt;\\n\\n    &lt;button class=\\\&quot;btn forward\\\&quot;&gt;move &lt;i class=\\\&quot;icon-chevron-right\\\&quot;&gt;&lt;/i&gt;&lt;/button&gt;\\n    &lt;button class=\\\&quot;btn next\\\&quot;&gt;item &lt;i class=\\\&quot;icon-chevron-right\\\&quot;&gt;&lt;/i&gt;&lt;/button&gt;\\n    &lt;button class=\\\&quot;btn nextPage\\\&quot;&gt;page &lt;i class=\\\&quot;icon-chevron-right\\\&quot;&gt;&lt;/i&gt;&lt;i class=\\\&quot;icon-chevron-right\\\&quot;&gt;&lt;/i&gt;&lt;/button&gt;\\n  &lt;/div&gt;\\n&lt;/div&gt;\&quot;,\&quot;css\&quot;:\&quot;body {\\n  background: #e8e8e8;\\n}\\n\\n.container {\\n  margin: 0 auto;\\n}\\n\\n\\n/* Example wrapper */\\n\\n.wrap {\\n  position: relative;\\n  margin: 3em 0;\\n}\\n\\n\\n/* Frame */\\n\\n.frame {\\n  height: 250px;\\n  line-height: 250px;\\n  overflow: hidden;\\n}\\n\\n.frame ul {\\n  list-style: none;\\n  margin: 0;\\n  padding: 0;\\n  height: 100%;\\n  font-size: 50px;\\n}\\n\\n.frame ul li {\\n  float: left;\\n  width: 227px;\\n  height: 100%;\\n  margin: 0 1px 0 0;\\n  padding: 0;\\n  background: #333;\\n  color: #ddd;\\n  text-align: center;\\n  cursor: pointer;\\n}\\n\\n.frame ul li.active {\\n  color: #fff;\\n  background: #a03232;\\n}\\n\\n\\n/* Scrollbar */\\n\\n.scrollbar {\\n  margin: 0 0 1em 0;\\n  height: 2px;\\n  background: #ccc;\\n  line-height: 0;\\n}\\n\\n.scrollbar .handle {\\n  width: 100px;\\n  height: 100%;\\n  background: #292a33;\\n  cursor: pointer;\\n}\\n\\n.scrollbar .handle .mousearea {\\n  position: absolute;\\n  top: -9px;\\n  left: 0;\\n  width: 100%;\\n  height: 20px;\\n}\\n\\n\\n/* Pages */\\n\\n.pages {\\n  list-style: none;\\n  margin: 20px 0;\\n  padding: 0;\\n  text-align: center;\\n}\\n\\n.pages li {\\n  display: inline-block;\\n  width: 14px;\\n  height: 14px;\\n  margin: 0 4px;\\n  text-indent: -999px;\\n  border-radius: 10px;\\n  cursor: pointer;\\n  overflow: hidden;\\n  background: #fff;\\n  box-shadow: inset 0 0 0 1px rgba(0, 0, 0, .2);\\n}\\n\\n.pages li:hover {\\n  background: #aaa;\\n}\\n\\n.pages li.active {\\n  background: #666;\\n}\\n\\n\\n/* Controls */\\n\\n.controls {\\n  margin: 25px 0;\\n  text-align: center;\\n}\\n\\n\\n/* One Item Per Frame example*/\\n\\n.oneperframe {\\n  height: 300px;\\n  line-height: 300px;\\n}\\n\\n.oneperframe ul li {\\n  width: 1140px;\\n}\\n\\n.oneperframe ul li.active {\\n  background: #333;\\n}\\n\\n\\n/* Crazy example */\\n\\n.crazy ul li:nth-child(2n) {\\n  width: 100px;\\n  margin: 0 4px 0 20px;\\n}\\n\\n.crazy ul li:nth-child(3n) {\\n  width: 300px;\\n  margin: 0 10px 0 5px;\\n}\\n\\n.crazy ul li:nth-child(4n) {\\n  width: 400px;\\n  margin: 0 30px 0 2px;\\n}\&quot;,\&quot;parent\&quot;:6499895,\&quot;js\&quot;:\&quot;jQuery(function($) {\\n  &#39;use strict&#39;;\\n\\n  // -------------------------------------------------------------\\n  //   Basic Navigation\\n  // -------------------------------------------------------------\\n  (function() {\\n    var $frame = $(&#39;#basic&#39;);\\n    var $slidee = $frame.children(&#39;ul&#39;).eq(0);\\n    var $wrap = $frame.parent();\\n\\n    // Call Sly on frame\\n    $frame.sly({\\n      horizontal: 1,\\n      itemNav: &#39;basic&#39;,\\n      smart: 1,\\n      activateOn: &#39;click&#39;,\\n      mouseDragging: 1,\\n      touchDragging: 1,\\n      releaseSwing: 1,\\n      startAt: 3,\\n      scrollBar: $wrap.find(&#39;.scrollbar&#39;),\\n      scrollBy: 1,\\n      pagesBar: $wrap.find(&#39;.pages&#39;),\\n      activatePageOn: &#39;click&#39;,\\n      speed: 300,\\n      elasticBounds: 1,\\n      easing: &#39;easeOutExpo&#39;,\\n      dragHandle: 1,\\n      dynamicHandle: 1,\\n      clickBar: 1,\\n\\n      // Buttons\\n      forward: $wrap.find(&#39;.forward&#39;),\\n      backward: $wrap.find(&#39;.backward&#39;),\\n      prev: $wrap.find(&#39;.prev&#39;),\\n      next: $wrap.find(&#39;.next&#39;),\\n      prevPage: $wrap.find(&#39;.prevPage&#39;),\\n      nextPage: $wrap.find(&#39;.nextPage&#39;)\\n    });\\n\\n    // To Start button\\n    $wrap.find(&#39;.toStart&#39;).on(&#39;click&#39;, function() {\\n      var item = $(this).data(&#39;item&#39;);\\n      // Animate a particular item to the start of the frame.\\n      // If no item is provided, the whole content will be animated.\\n      $frame.sly(&#39;toStart&#39;, item);\\n    });\\n\\n    // To Center button\\n    $wrap.find(&#39;.toCenter&#39;).on(&#39;click&#39;, function() {\\n      var item = $(this).data(&#39;item&#39;);\\n      // Animate a particular item to the center of the frame.\\n      // If no item is provided, the whole content will be animated.\\n      $frame.sly(&#39;toCenter&#39;, item);\\n    });\\n\\n    // To End button\\n    $wrap.find(&#39;.toEnd&#39;).on(&#39;click&#39;, function() {\\n      var item = $(this).data(&#39;item&#39;);\\n      // Animate a particular item to the end of the frame.\\n      // If no item is provided, the whole content will be animated.\\n      $frame.sly(&#39;toEnd&#39;, item);\\n    });\\n\\n    // Add item\\n    $wrap.find(&#39;.add&#39;).on(&#39;click&#39;, function() {\\n      $frame.sly(&#39;add&#39;, &#39;&lt;li&gt;&#39; + $slidee.children().length + &#39;&lt;/li&gt;&#39;);\\n    });\\n\\n    // Remove item\\n    $wrap.find(&#39;.remove&#39;).on(&#39;click&#39;, function() {\\n      $frame.sly(&#39;remove&#39;, -1);\\n    });\\n  }());\\n\\n  // -------------------------------------------------------------\\n  //   Centered Navigation\\n  // -------------------------------------------------------------\\n  (function() {\\n    var $frame = $(&#39;#centered&#39;);\\n    var $wrap = $frame.parent();\\n\\n    // Call Sly on frame\\n    $frame.sly({\\n      horizontal: 1,\\n      itemNav: &#39;centered&#39;,\\n      smart: 1,\\n      activateOn: &#39;click&#39;,\\n      mouseDragging: 1,\\n      touchDragging: 1,\\n      releaseSwing: 1,\\n      startAt: 4,\\n      scrollBar: $wrap.find(&#39;.scrollbar&#39;),\\n      scrollBy: 1,\\n      speed: 300,\\n      elasticBounds: 1,\\n      easing: &#39;easeOutExpo&#39;,\\n      dragHandle: 1,\\n      dynamicHandle: 1,\\n      clickBar: 1,\\n\\n      // Buttons\\n      prev: $wrap.find(&#39;.prev&#39;),\\n      next: $wrap.find(&#39;.next&#39;)\\n    });\\n  }());\\n\\n  // -------------------------------------------------------------\\n  //   Force Centered Navigation\\n  // -------------------------------------------------------------\\n  (function() {\\n    var $frame = $(&#39;#forcecentered&#39;);\\n    var $wrap = $frame.parent();\\n\\n    // Call Sly on frame\\n    $frame.sly({\\n      horizontal: 1,\\n      itemNav: &#39;forceCentered&#39;,\\n      smart: 1,\\n      activateMiddle: 1,\\n      activateOn: &#39;click&#39;,\\n      mouseDragging: 1,\\n      touchDragging: 1,\\n      releaseSwing: 1,\\n      startAt: 0,\\n      scrollBar: $wrap.find(&#39;.scrollbar&#39;),\\n      scrollBy: 1,\\n      speed: 300,\\n      elasticBounds: 1,\\n      easing: &#39;easeOutExpo&#39;,\\n      dragHandle: 1,\\n      dynamicHandle: 1,\\n      clickBar: 1,\\n\\n      // Buttons\\n      prev: $wrap.find(&#39;.prev&#39;),\\n      next: $wrap.find(&#39;.next&#39;)\\n    });\\n  }());\\n\\n  // -------------------------------------------------------------\\n  //   Cycle By Items\\n  // -------------------------------------------------------------\\n  (function() {\\n    var $frame = $(&#39;#cycleitems&#39;);\\n    var $wrap = $frame.parent();\\n\\n    // Call Sly on frame\\n    $frame.sly({\\n      horizontal: 1,\\n      itemNav: &#39;basic&#39;,\\n      smart: 1,\\n      activateOn: &#39;click&#39;,\\n      mouseDragging: 1,\\n      touchDragging: 1,\\n      releaseSwing: 1,\\n      startAt: 0,\\n      scrollBar: $wrap.find(&#39;.scrollbar&#39;),\\n      scrollBy: 1,\\n      speed: 300,\\n      elasticBounds: 1,\\n      easing: &#39;easeOutExpo&#39;,\\n      dragHandle: 1,\\n      dynamicHandle: 1,\\n      clickBar: 1,\\n\\n      // Cycling\\n      cycleBy: &#39;items&#39;,\\n      cycleInterval: 1000,\\n      pauseOnHover: 1,\\n\\n      // Buttons\\n      prev: $wrap.find(&#39;.prev&#39;),\\n      next: $wrap.find(&#39;.next&#39;)\\n    });\\n\\n    // Pause button\\n    $wrap.find(&#39;.pause&#39;).on(&#39;click&#39;, function() {\\n      $frame.sly(&#39;pause&#39;);\\n    });\\n\\n    // Resume button\\n    $wrap.find(&#39;.resume&#39;).on(&#39;click&#39;, function() {\\n      $frame.sly(&#39;resume&#39;);\\n    });\\n\\n    // Toggle button\\n    $wrap.find(&#39;.toggle&#39;).on(&#39;click&#39;, function() {\\n      $frame.sly(&#39;toggle&#39;);\\n    });\\n  }());\\n\\n  // -------------------------------------------------------------\\n  //   Cycle By Pages\\n  // -------------------------------------------------------------\\n  (function() {\\n    var $frame = $(&#39;#cyclepages&#39;);\\n    var $wrap = $frame.parent();\\n\\n    // Call Sly on frame\\n    $frame.sly({\\n      horizontal: 1,\\n      itemNav: &#39;basic&#39;,\\n      smart: 1,\\n      activateOn: &#39;click&#39;,\\n      mouseDragging: 1,\\n      touchDragging: 1,\\n      releaseSwing: 1,\\n      startAt: 0,\\n      scrollBar: $wrap.find(&#39;.scrollbar&#39;),\\n      scrollBy: 1,\\n      pagesBar: $wrap.find(&#39;.pages&#39;),\\n      activatePageOn: &#39;click&#39;,\\n      speed: 300,\\n      elasticBounds: 1,\\n      easing: &#39;easeOutExpo&#39;,\\n      dragHandle: 1,\\n      dynamicHandle: 1,\\n      clickBar: 1,\\n\\n      // Cycling\\n      cycleBy: &#39;pages&#39;,\\n      cycleInterval: 1000,\\n      pauseOnHover: 1,\\n      startPaused: 1,\\n\\n      // Buttons\\n      prevPage: $wrap.find(&#39;.prevPage&#39;),\\n      nextPage: $wrap.find(&#39;.nextPage&#39;)\\n    });\\n\\n    // Pause button\\n    $wrap.find(&#39;.pause&#39;).on(&#39;click&#39;, function() {\\n      $frame.sly(&#39;pause&#39;);\\n    });\\n\\n    // Resume button\\n    $wrap.find(&#39;.resume&#39;).on(&#39;click&#39;, function() {\\n      $frame.sly(&#39;resume&#39;);\\n    });\\n\\n    // Toggle button\\n    $wrap.find(&#39;.toggle&#39;).on(&#39;click&#39;, function() {\\n      $frame.sly(&#39;toggle&#39;);\\n    });\\n  }());\\n\\n  // -------------------------------------------------------------\\n  //   One Item Per Frame\\n  // -------------------------------------------------------------\\n  (function() {\\n    var $frame = $(&#39;#oneperframe&#39;);\\n    var $wrap = $frame.parent();\\n\\n    // Call Sly on frame\\n    $frame.sly({\\n      horizontal: 1,\\n      itemNav: &#39;forceCentered&#39;,\\n      smart: 1,\\n      activateMiddle: 1,\\n      mouseDragging: 1,\\n      touchDragging: 1,\\n      releaseSwing: 1,\\n      startAt: 0,\\n      scrollBar: $wrap.find(&#39;.scrollbar&#39;),\\n      scrollBy: 1,\\n      speed: 300,\\n      elasticBounds: 1,\\n      easing: &#39;easeOutExpo&#39;,\\n      dragHandle: 1,\\n      dynamicHandle: 1,\\n      clickBar: 1,\\n\\n      // Buttons\\n      prev: $wrap.find(&#39;.prev&#39;),\\n      next: $wrap.find(&#39;.next&#39;)\\n    });\\n  }());\\n\\n  // -------------------------------------------------------------\\n  //   Crazy\\n  // -------------------------------------------------------------\\n  (function() {\\n    var $frame = $(&#39;#crazy&#39;);\\n    var $slidee = $frame.children(&#39;ul&#39;).eq(0);\\n    var $wrap = $frame.parent();\\n\\n    // Call Sly on frame\\n    $frame.sly({\\n      horizontal: 1,\\n      itemNav: &#39;basic&#39;,\\n      smart: 1,\\n      activateOn: &#39;click&#39;,\\n      mouseDragging: 1,\\n      touchDragging: 1,\\n      releaseSwing: 1,\\n      startAt: 3,\\n      scrollBar: $wrap.find(&#39;.scrollbar&#39;),\\n      scrollBy: 1,\\n      pagesBar: $wrap.find(&#39;.pages&#39;),\\n      activatePageOn: &#39;click&#39;,\\n      speed: 300,\\n      elasticBounds: 1,\\n      easing: &#39;easeOutExpo&#39;,\\n      dragHandle: 1,\\n      dynamicHandle: 1,\\n      clickBar: 1,\\n\\n      // Buttons\\n      forward: $wrap.find(&#39;.forward&#39;),\\n      backward: $wrap.find(&#39;.backward&#39;),\\n      prev: $wrap.find(&#39;.prev&#39;),\\n      next: $wrap.find(&#39;.next&#39;),\\n      prevPage: $wrap.find(&#39;.prevPage&#39;),\\n      nextPage: $wrap.find(&#39;.nextPage&#39;)\\n    });\\n\\n    // To Start button\\n    $wrap.find(&#39;.toStart&#39;).on(&#39;click&#39;, function() {\\n      var item = $(this).data(&#39;item&#39;);\\n      // Animate a particular item to the start of the frame.\\n      // If no item is provided, the whole content will be animated.\\n      $frame.sly(&#39;toStart&#39;, item);\\n    });\\n\\n    // To Center button\\n    $wrap.find(&#39;.toCenter&#39;).on(&#39;click&#39;, function() {\\n      var item = $(this).data(&#39;item&#39;);\\n      // Animate a particular item to the center of the frame.\\n      // If no item is provided, the whole content will be animated.\\n      $frame.sly(&#39;toCenter&#39;, item);\\n    });\\n\\n    // To End button\\n    $wrap.find(&#39;.toEnd&#39;).on(&#39;click&#39;, function() {\\n      var item = $(this).data(&#39;item&#39;);\\n      // Animate a particular item to the end of the frame.\\n      // If no item is provided, the whole content will be animated.\\n      $frame.sly(&#39;toEnd&#39;, item);\\n    });\\n\\n    // Add item\\n    $wrap.find(&#39;.add&#39;).on(&#39;click&#39;, function() {\\n      $frame.sly(&#39;add&#39;, &#39;&lt;li&gt;&#39; + $slidee.children().length + &#39;&lt;/li&gt;&#39;);\\n    });\\n\\n    // Remove item\\n    $wrap.find(&#39;.remove&#39;).on(&#39;click&#39;, function() {\\n      $frame.sly(&#39;remove&#39;, -1);\\n    });\\n  }());\\n});\&quot;,\&quot;html_pre_processor\&quot;:\&quot;none\&quot;,\&quot;css_pre_processor\&quot;:\&quot;none\&quot;,\&quot;js_pre_processor\&quot;:\&quot;none\&quot;,\&quot;html_classes\&quot;:\&quot;\&quot;,\&quot;css_starter\&quot;:\&quot;neither\&quot;,\&quot;css_prefix_free\&quot;:null,\&quot;css_external\&quot;:null,\&quot;js_library\&quot;:null,\&quot;js_modernizr\&quot;:null,\&quot;js_external\&quot;:null,\&quot;created_at\&quot;:\&quot;2016-01-19T21:01:46.000Z\&quot;,\&quot;updated_at\&quot;:\&quot;2016-01-19T21:01:46.000Z\&quot;,\&quot;session_hash\&quot;:\&quot;e58d66750005dd91ec1b75ef35bb0631\&quot;,\&quot;title\&quot;:\&quot;sly\&quot;,\&quot;description\&quot;:\&quot;\\n\\nForked from [SitePoint](http://codepen.io/SitePoint/)&#39;s Pen [sly](http://codepen.io/SitePoint/pen/jWGJpY/).\&quot;,\&quot;slug_hash\&quot;:\&quot;bEYOov\&quot;,\&quot;head\&quot;:\&quot;\&quot;,\&quot;private\&quot;:false,\&quot;has_animation\&quot;:false,\&quot;css_pre_processor_lib\&quot;:\&quot;\&quot;,\&quot;checksum\&quot;:3527005060,\&quot;screenshot_uuid\&quot;:\&quot;c4eb15c2-e147-498d-884d-c00845e5c62a\&quot;,\&quot;team_id\&quot;:0,\&quot;css_prefix\&quot;:\&quot;neither\&quot;,\&quot;template\&quot;:false,\&quot;js_module\&quot;:null,\&quot;pen_hash\&quot;:null,\&quot;resource_urls\&quot;:null}&quot;,&quot;__jwt&quot;:&quot;eyJhbGciOiJIUzI1NiJ9.eyJkYXRhIjp7InBhaWQiOmZhbHNlLCJ0ZWFtX2lkIjoiWWRFekduIiwidXNlcl9pZCI6IlZvRGtOWiIsInVzZXJuYW1lIjoiYW5vbiJ9LCJleHAiOjE1ODc2MzI1MTR9.PyuVAGwXyVKWxnbGFpOrtmbChGQIGVTvE39VQxc4uN8&quot;,&quot;__layoutType&quot;:null,&quot;__packages_domain&quot;:&quot;https://bundles-development.cdpn.io&quot;,&quot;__packages_enabled&quot;:false,&quot;__pageType&quot;:&quot;pen&quot;,&quot;__preprocessors_url&quot;:&quot;https://wfwf9k3tn7.execute-api.us-west-2.amazonaws.com/production&quot;,&quot;__profiled&quot;:{&quot;id&quot;:263076,&quot;hashid&quot;:&quot;eqNRoO&quot;,&quot;name&quot;:&quot;Ritesh Kumar&quot;,&quot;username&quot;:&quot;ritz078&quot;,&quot;type&quot;:&quot;user&quot;,&quot;is_team&quot;:false,&quot;base_url&quot;:&quot;/ritz078&quot;},&quot;__rtData&quot;:&quot;{\&quot;maxMembers\&quot;:0,\&quot;roomID\&quot;:\&quot;bEYOov/live\&quot;,\&quot;roomType\&quot;:\&quot;live\&quot;,\&quot;updatedAt\&quot;:1453237306,\&quot;user\&quot;:{\&quot;id\&quot;:\&quot;VoDkNZ\&quot;,\&quot;hashid\&quot;:\&quot;VoDkNZ\&quot;,\&quot;name\&quot;:\&quot;Captain Anonymous\&quot;,\&quot;username\&quot;:\&quot;anon\&quot;,\&quot;role\&quot;:\&quot;editor\&quot;}}&quot;,&quot;__embed_modal_script&quot;:&quot;https://static.codepen.io/assets/embed/modal/embed_modal-aa5636d39235a3a7657d2bc63cbd39f4a4b2d5e4843f1cc443a6acba70d871d2.js&quot;,&quot;__run_mode_script&quot;:&quot;https://static.codepen.io/assets/libs/codemirror/addon/runmode/runmode-71408fc65dcc694b1f598f08398b08c8f4494f90b73c64cd4ecf01eaaf3a65d7.js&quot;,&quot;__runtime_js&quot;:&quot;https://static.codepen.io/assets/common/runtime-78f7737f2b92b1b279253c92344b93db2bdf0e3193c90dae7d462d102b33c722.js&quot;,&quot;__standalone_run_mode_script&quot;:&quot;https://static.codepen.io/assets/libs/codemirror/addon/runmode/runmode-standalone-e82db9c70d13c4fd77beef3e400ebba56987206b1e5bb9e39f28c2044991b089.js&quot;,&quot;__syntax_highlighting_script&quot;:&quot;https://static.codepen.io/assets/comments/syntax_highlight_comments.js&quot;,&quot;__eijs&quot;:&quot;https://static.codepen.io/assets/embed/ei.js&quot;,&quot;__favicon_mask_icon&quot;:&quot;https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg&quot;,&quot;__favicon_shortcut_icon&quot;:&quot;https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico&quot;,&quot;__path_to_iframe_console_runner&quot;:&quot;https://static.codepen.io/assets/editor/iframe/iframeConsoleRunner-dc0d50e60903d6825042d06159a8d5ac69a6c0e9bcef91e3380b17617061ce0f.js&quot;,&quot;__path_to_iframe_refresh_css&quot;:&quot;https://static.codepen.io/assets/editor/iframe/iframeRefreshCSS-e03f509ba0a671350b4b363ff105b2eb009850f34a2b4deaadaa63ed5d970b37.js&quot;,&quot;__path_to_iframe_runtime_errors&quot;:&quot;https://static.codepen.io/assets/editor/iframe/iframeRuntimeErrors-29f059e28a3c6d3878960591ef98b1e303c1fe1935197dae7797c017a3ca1e82.js&quot;,&quot;__path_to_processor_worker&quot;:&quot;https://static.codepen.io/assets/packs/router.js&quot;,&quot;__path_to_stop_execution_on_timeout&quot;:&quot;https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js&quot;,&quot;__path_to_webpack_runtime&quot;:&quot;https://static.codepen.io/assets/common/runtime-78f7737f2b92b1b279253c92344b93db2bdf0e3193c90dae7d462d102b33c722.js&quot;,&quot;__pen_normalize_css_url&quot;:&quot;https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css&quot;,&quot;__pen_prefix_free_url&quot;:&quot;https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js&quot;,&quot;__pen_reset_css_url&quot;:&quot;https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css&quot;,&quot;__cdn_css_url&quot;:&quot;https://static.codepen.io/assets/editor/other/cdn/cdncss_data-3920a09dad6d4fc8f26388543dd6e897701bb9eb7adad7644001579fa97c3bcc.json&quot;,&quot;__cdn_js_url&quot;:&quot;https://static.codepen.io/assets/editor/other/cdn/cdnjs_data-d48ecfb6f69488f4fd036843964b79819dab4f33a0ef800d8e3362688252e672.json&quot;,&quot;__theme_url_twilight&quot;:&quot;https://static.codepen.io/assets/editor/themes/twilight-c4d2eafba805f08fdb40c0900ac100b78469aba0532ca487a4fb1591a9424a02.css&quot;,&quot;__theme_url_solarized_dark&quot;:&quot;https://static.codepen.io/assets/editor/themes/solarized-dark-be3733c3b9fe7b35d3900cdb1d552f7cef1930f90aedbe3b08a2f4f7363f47f8.css&quot;,&quot;__theme_url_tomorrow_night&quot;:&quot;https://static.codepen.io/assets/editor/themes/tomorrow-night-9f7a64b583f014a14d2b57f6b602f1b102c0603f13dfdb78d072e86e739bfa17.css&quot;,&quot;__theme_url_oceanic_dark&quot;:&quot;https://static.codepen.io/assets/editor/themes/oceanic-dark-75062c19b7b09467732c36bb9e63f72b576a2e4d1f6939ceeed4ba286210232b.css&quot;,&quot;__theme_url_panda&quot;:&quot;https://static.codepen.io/assets/editor/themes/panda-2b9f60f9baffb42b45bfa2fb8a8a32893eb378809a49a6aae1e6eca936e0c138.css&quot;,&quot;__theme_url_duotone_dark&quot;:&quot;https://static.codepen.io/assets/editor/themes/duotone-dark-1447b1135a3e20d5faa7f6eefaca8222696a4a0892e72d28818cb595b47fa7ef.css&quot;,&quot;__theme_url_highcontrast_dark&quot;:&quot;https://static.codepen.io/assets/editor/themes/highcontrast-dark-a9166d9422d2610b098ad9e69a49ae54f2cdd1fcb34e2c4613bf6d6bbe4bbd79.css&quot;,&quot;__theme_url_classic&quot;:&quot;https://static.codepen.io/assets/editor/themes/classic-2fa24f22265ce4cf2b8258542a3a1cafea72fd369cd81c1114fe7185a4175aea.css&quot;,&quot;__theme_url_solarized_light&quot;:&quot;https://static.codepen.io/assets/editor/themes/solarized-light-0c461c28fa87008a5fd32233c2c6fc0204184273435145143f64b32e9a1e9f81.css&quot;,&quot;__theme_url_xq_light&quot;:&quot;https://static.codepen.io/assets/editor/themes/xq-light-dcb53045ea59518f816ef2d6c40f171f7819a008bba9607e6a6faf4a73fcc119.css&quot;,&quot;__theme_url_oceanic_light&quot;:&quot;https://static.codepen.io/assets/editor/themes/oceanic-light-aac2754a2516fd7493c296eaefb4c4a17415c2634ce362611c1ba38bd2a277cc.css&quot;,&quot;__theme_url_mdn_like&quot;:&quot;https://static.codepen.io/assets/editor/themes/mdn-like-4db89c6e07b846f47a817a6ece4f8d71e3b596b207534cf7cd822ab13e5d0f3b.css&quot;,&quot;__theme_url_duotone_light&quot;:&quot;https://static.codepen.io/assets/editor/themes/duotone-light-8a45f16fbedcbed4220ddf03d615590570d1b885c59f998d5899c1d6f658f3df.css&quot;,&quot;__theme_url_highcontrast_light&quot;:&quot;https://static.codepen.io/assets/editor/themes/highcontrast-light-9e727ae97fbe6e955041644fb9f185548aee393d5a0084544b7f71b39dfe2913.css&quot;,&quot;__theme_url_scoped_twilight&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/twilight-ab6718aaebdecf2af943a2f7d3ef87076601c4ef94f1e1aaaf9fa4267b60a2f8.css&quot;,&quot;__theme_url_scoped_solarized_dark&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/solarized-dark-4e82f4e8dfe983227d8fcba0c4c14418ae4112ca15623390ad903567cc253638.css&quot;,&quot;__theme_url_scoped_tomorrow_night&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/tomorrow-night-0df4b141fac44720400a9a5ed2c9adc1f35d3f15bf16454b37f91461b5c04374.css&quot;,&quot;__theme_url_scoped_oceanic_dark&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/oceanic-dark-5425f37e5d1e825a4095cd4a4ecf3cf521d221438aebdd30eeebfa323db10c30.css&quot;,&quot;__theme_url_scoped_panda&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/panda-67d0cfb233b3ab2bea5e2bb0943f8b1a89ae267b3fbfab25f005f487b06a502d.css&quot;,&quot;__theme_url_scoped_duotone_dark&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/duotone-dark-5952572c9464491c3aacc4e7230abcf1e734d40374f59e59e959506741243bdb.css&quot;,&quot;__theme_url_scoped_highcontrast_dark&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/highcontrast-dark-5720bc7bfc07d7e3acc5e117b6fe35a6e14be412820790636f7b78727b6973e0.css&quot;,&quot;__theme_url_scoped_classic&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/classic-c62bf0da3affc130fe1fec30935afd3eec44e91c8cc1d13a0740696900f9cb63.css&quot;,&quot;__theme_url_scoped_solarized_light&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/solarized-light-828b823ba7e6f0dc8fc6fd7d80e518c834045ad3f809ecd117f7d58b9bbf1508.css&quot;,&quot;__theme_url_scoped_xq_light&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/xq-light-e0760645cf1cbe5f2d06e4ad60b7bb02a96cbc7f008b43f1a799d8cee9c27cea.css&quot;,&quot;__theme_url_scoped_oceanic_light&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/oceanic-light-2926c1cc436aacfae8536810b6bcc6e0692c6b3c5363430bab15d904e58a3851.css&quot;,&quot;__theme_url_scoped_mdn_like&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/mdn-like-d25db1336f1b20b562df6e0e5b2701bcaca89138d1017167212f9e727f49b367.css&quot;,&quot;__theme_url_scoped_duotone_light&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/duotone-light-410382287903ce7313c3a5c9cbf8e1c7de4caea890472df62fe6d63b3c7c115d.css&quot;,&quot;__theme_url_scoped_highcontrast_light&quot;:&quot;https://static.codepen.io/assets/editor/themes/scoped/highcontrast-light-8e466d48cd44142f30738f4cd07a197048c9b50dba771affb6b1717bc0b4442d.css&quot;}">
<script src="https://static.codepen.io/assets/common/browser_support-1963aa6406ae47d3176af996336c5d219acd8913c5af309e72f18933e95201cc.js"></script>
<script src="https://static.codepen.io/assets/common/everypage-c9e67ee9b7c2932b14d2cc61b5030e706c94919a2e7339f8b9127aa8c189a048.js"></script>
<script src="https://static.codepen.io/assets/common/analytics_and_notifications-368e5a521a97eb503016deb265ab36b7871635c86a498f8bdc9c8bf781af9e32.js"></script>
<script src="https://static.codepen.io/assets/packs/js/vendor-976487b0c2b56f17d9d8.chunk.js"></script>
<script src="https://static.codepen.io/assets/packs/js/2-04a18ef9c4bd9cdaf4f4.chunk.js"></script>
<script src="https://static.codepen.io/assets/packs/js/everypage-235a439dd31b92935366.js"></script>
<script src="https://static.codepen.io/assets/packs/js/processorRouter-1b2770598393681842a2.js"></script>
<script src="https://static.codepen.io/assets/editor/global/commonLibs-7484fe04f7187bb8ecb83c4962db75fdf5d900e6e629bfab2f8df7629e357051.js"></script>
<script src="https://static.codepen.io/assets/editor/global/codemirror-b8b886ef5a1a8d714eef6e7d5aec5b81630003feb80e3f9ef8cc949fb5a2645b.js"></script>
<script src="https://static.codepen.io/assets/libs/emmet-codemirror-plugin-5d6164559517c9065f31696d2b6c916ff238693ed8c4260c1023e65c0f3fd658.js"></script>
<script src="https://static.codepen.io/assets/editor/pen/index-98f0483207ca0bf72426da55f6a97dc93e5987de200c55254d1bbf0593c6bba7.js"></script>
</body>
</html>
