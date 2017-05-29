<form action="<?php echo Yii::$app->getUrlManager()->createUrl(["/blog/default/index"]) ?>" method="get">
    <div class="search input-group">
        <input type="text" class="form-control c-square c-theme-border" name="keyword" id="keyword"
               value="<?php if (isset($_GET['keyword']) && strlen($_GET['keyword']) > 0) echo $_GET['keyword']; else echo 'palabra clave'; ?>"
               class="search_input" onblur="if(this.value=='') this.value='palabra clave';"
               onfocus="if(this.value=='palabra clave') this.value='';"/>
        <span class="input-group-btn">
                                        <input type="submit"
                                               class="search_submit btn c-theme-btn c-theme-border c-btn-square"
                                               id="search_submit" value="Buscar"/>
                                    </span>
    </div>
</form>