<?php echo $this->Html->script(array('addtocart.js'), array('inline' => false)); ?>
<?php $this->extend('../Common/sidebar'); ?>
<div id="products index">
<h2>Products</h2>

<table>
    <?php
//print_r($products); //DEBUG ONLY
    foreach ($productBrands as $productBrand) {
        ?>
       
            <tr>
                <th><?php echo $productBrand['products']['brand'] ?></th>
            </tr>    
        <?php
        $i = 0;
        foreach ($products as $product) {
            if ($productBrand['products']['brand'] == $product['Product']['brand']) {
                if ($i % 3 == 0) {
                    if ($i != 0) {
                        ?>
                    </tr>
                    </table>
                    <?php
                }
                ?>
                <table>
                    <tr>
                <?php
            }
            ?>


                    <td>
                        <table>

                            <tr><td><?php echo $this->Html->image('files/' . $product['Product']['image']); ?></td> </tr>
                            <tr>
                                <td><?php echo $this->Html->link(($product['Product']['model']), array('action' => 'viewProduct', $product['Product']['id'],$product['Product']['brand'])); ?> </td>
                            </tr>   
                        </table>  
                    </td>


            <?php
            $i++;
        }
        ?>

            <?php }
            ?>
        <?php }
        ?>

</table>
</div>
<div class="jobs actions">
	<p><?php echo $this->Html->link(__('Cart'),array('controller'=>'shop','action'=>'cart'));?></p>
</div>