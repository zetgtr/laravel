<div style="display: grid; gap: 1.5rem; grid-template-columns: repeat(2,1fr)">
<?php foreach ($categorys as $category){?>
        <a href="<?=route('news',$category['id'])?>" style="display: flex; background-color: #cccccc; border-radius: 20px; flex-direction: column; align-items: center; padding: 2rem">
            <h2><?=$category['title']?></h2>
            <p><?=$category['description']?></p>
        </a>
<?php } ?>
</div>
