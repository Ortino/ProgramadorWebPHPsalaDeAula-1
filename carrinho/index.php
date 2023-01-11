<?php 

    $itens = array(['img'=>'123.jpg', 'preco'=>'2.500' ],
                ['img'=>'1234.jpg', 'preco'=>'3.000' ],
                ['img'=>'mag1.jpg', 'preco'=>'4.000' ],
                ['img'=>'sem_tilulo.png', 'preco'=>'4.500' ]);

    foreach ($itens as $key =>$value) {
        #
    }

?>
 
<div class="produto">
    <img src="<?php echo $value['img'] ?>"/>
    <a href="?adicionar=<?php echo | ?>">Adicionar ao carrinho!</a>

</div>