<?php 
/*
Template Name: API consumo
Template Post Type: post, page, event
*/
get_header();?>
<?php 
$urlEmbed = 'https://api.sampleapis.com/beers/ale';

    $responseEmbed = wp_remote_get( $urlEmbed, array(
        'method'      => 'GET'
        )
    );
     
    if ( is_wp_error( $responseEmbed ) ) {
        return false;
    } else {
        $rEmbed = wp_remote_retrieve_body( $responseEmbed );
        $jsonEmbed = json_decode($rEmbed, true);
    }
// echo '<pre>';
//     echo print_r($jsonEmbed);
// echo '</pre>';

    foreach($jsonEmbed as $dados){
            
        echo 'Preço '. $dados['price'] . '<br>';
        echo 'Nome '. $dados['name'] . '<br>';
        echo 'Avaliacao '. $dados['rating']['average'] . '<br>';
        echo 'Visualizações '. $dados['rating']['reviews'] . '<br>';
        ?>
        <br>
        <img src="<?php echo $dados['image'] ?>">
        <br>
        <?php echo'ID: '. $dados['id'] . '<br>';

        echo '<br>';
    }

?>

<?php get_footer();?>