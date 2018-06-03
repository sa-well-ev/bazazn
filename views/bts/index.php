<?php
/**
 * Это тестовый вид для отрисовки возможностей Bootstrap включённой в Yii2
 */

use yii\bootstrap\Collapse;

?>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                       aria-expanded="false" aria-controls="collapseOne">
                        Collapsible Group Item #1
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf
                    moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                    eiusmod.
                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                    ea
                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
                    denim
                    aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseTwo"
                       aria-expanded="false" aria-controls="collapseTwo">
                        Collapsible Group Item #2
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf
                    moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                    eiusmod.
                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                    ea
                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
                    denim
                    aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                       href="#collapseThree"
                       aria-expanded="false" aria-controls="collapseThree">
                        Collapsible Group Item #3
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                    wolf
                    moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                    eiusmod.
                    Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda
                    shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                    ea
                    proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
                    denim
                    aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>
    </div>

    <div class="panel-group" role="tablist">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="collapseListGroupHeading1">
                <h4 class="panel-title">
                    <a href="#collapseListGroup1" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup1"> Collapsible list group </a>
                </h4>
            </div>
            <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroup1" aria-labelledby="collapseListGroupHeading1" aria-expanded="false" style="height: 0px;">
                <ul class="list-group">
                    <li class="list-group-item">Bootply</li>
<!--                    начало вложенного блока-->
                    <div class="panel-heading" role="tab" id="collapseListGroupHeading2">
                        <h4 class="panel-title">
                            <a href="#collapseListGroup2" class="collapsed" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="collapseListGroup2"> Collapsible list group </a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" role="tabpanel" id="collapseListGroup2" aria-labelledby="collapseListGroupHeading2" aria-expanded="false" style="height: 0px;">
                        <ul class="list-group">
                            <li class="list-group-item">Bootply</li>
                            <li class="list-group-item">One itmus ac facilin</li>
                            <li class="list-group-item">Second eros</li>
                        </ul>
                    </div>
<!--                    конец вложенного блока-->
                    <li class="list-group-item">One itmus ac facilin</li>
                    <li class="list-group-item">Second eros</li>
                </ul>
                <div class="panel-footer">Footer</div>
            </div>
        </div>
    </div>
    <h1>виджет</h1>>
<?= Collapse::widget([
    'items' => [
           'Introduction' => 'This is the first collapsable menu',
           'Second panel' => [
               'content' => 'This is the second collapsable menu',
               'content' => 'This is the second collapsable menu'
           ],
           [
               'label' => 'Third panel',
               'content' => 'This is the third collapsable menu',
           ],
       ]
])?>


