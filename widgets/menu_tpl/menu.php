    <li class="list-group-item list-group-item-warning">
    <a href="#" class="menu-ajax text-primary" data-id="<?= $category['id']?>">
        <?php if (isset($category['childs'])):?>
<!--            <span class="glyphicon glyphicon-plus-sign"></span>-->
        <?php endif; ?>
        <?= $category['name'] ?>
    </a>
    <?php if (isset($category['childs'])):?>
        <ul class="list-group">
            <?= $this->getMenuHtml($category['childs']); ?>
        </ul>
    <?php endif; ?>
</li>