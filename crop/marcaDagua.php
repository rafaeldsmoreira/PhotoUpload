<?php  

//$dir='../uploads/rafael/silva/Koala.jpg';
  
// Carregar imagem já existente no servidor
$imagem = imagecreatefromjpeg( $imgage );
/* @Parametros
 * "foto.jpg" - Caminho relativo ou absoluto da imagem a ser carregada.
 */
 
// importa um GIF
$imagemLogo = imagecreatefrompng( "../images/ok.png" );
/*
 * Você poderá usar aqui qualquer funcção que retorne de imagem:
 * imagecreatefromjpeg, imagecreate, imagecreatetruecolor
 * imagecreatefromPNG não funciona direito com transparencia
 */
 
// Obtem a largura_nova da imagem
$larguraLogo = imagesx( $imagemLogo );
 
// Obtém a altura da imagem
$alturaLogo = imagesy( $imagemLogo );
 
// Calcula X 5px da latreral direira
$x_logo = imagesx( $imagem ) - $larguraLogo - 5;
 
// Calcula X 5px do rodapé
$y_logo = imagesy( $imagem ) - $alturaLogo - 5;
 
// Copia a logo para a imagem
imagecopymerge( $imagem, $imagemLogo, $x_logo, $y_logo, 0, 0, $larguraLogo, $alturaLogo, 100 );
/* @Parametros
 * $imagem - Imagem previamente criada Usei imagecreatefromjpeg
 * $imagemLogo - Imagem previamente criada Usei imagecreatefromgif
 * $x_logo - Posição X que a logo será posicionada
 * $y_logo - Posição y que a logo será posicionada
 * 0 - Posição X da imagem de fundo. Não alterei.
 * 0 - Posição Y da imagem de fundo. Não alterei.
 * $larguraLogo - Largura da logo
 * $alturaLogo - Altura da logo
 * 100 - transparencia da logo
 */
 
// Header informando que é uma imagem JPEG

 
// eEnvia a imagem para o borwser ou arquivo
imagejpeg( $imagem, $imgage, 80 );
/* @Parametros
 * $imagem - Imagem previamente criada Usei imagecreatefromjpeg
 * NULL - O caminho para salvar o arquivo.
          Se não definido ou NULL, o stream da imagem será mostrado diretamente.
 * 80 - Qualidade da compresão da imagem.*/
?>

