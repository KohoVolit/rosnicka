<!DOCTYPE html>
<html lang="{$text['lang']}">
  <head>
    <title>{$title}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/united/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/page.css">
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
{block name=additionalHead}{/block} 
  </head>
  <body>
{include "header.tpl"}
<div class="container">
<div class="well opaque">
<div class="form-group col-md-8" style="float:none">
  <div class="input-group">
<input type="text" placeholder="Hledej..." class="form-control input-lg non-opaque" id="search-input">
<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
</div>
</div>
</div>
</div>
{block name=body}{/block}  
{include "footer.tpl"}
  </body>
</html>
