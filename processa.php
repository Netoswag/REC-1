<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém a frase enviada pelo formulário e garante que seja uma string
    $frase = isset($_POST['frase']) ? (string)$_POST['frase'] : '';

    // 1. Transformar a frase em letras maiúsculas
    $frase_maiusculas = strtoupper($frase);
    echo "<p>Frase em maiúsculas: $frase_maiusculas</p>";

    // 2. Exibir o caractere que está na posição do meio da frase
    $comprimento = strlen($frase_maiusculas);
    
    // Verifica se a string não está vazia
    if ($comprimento > 0) {
        $meio = floor($comprimento / 2); // Usa floor para lidar com frases de comprimento ímpar
        $caractere_meio = $frase_maiusculas[(string)$meio];
        echo "<p>Caractere na posição do meio: $caractere_meio</p>";
    } else {
        echo "<p>A frase está vazia. Não há caractere no meio.</p>";
    }

    // 3. Trocar todas as vogais pela letra X e exibir a quantidade de caracteres que não são vogais
    // A substituição é feita na string maiúscula
    $frase_sem_vogais = preg_replace('/[AEIOU]/', 'X', $frase_maiusculas);
    
    // Calcula a quantidade de caracteres não-vogais
    $quantidade_nao_vogais = strlen(preg_replace('/[AEIOU]/', '', $frase_maiusculas));
    
    echo "<p>Frase com vogais substituídas por X: $frase_sem_vogais</p>";
    echo "<p>Quantidade de caracteres que não são vogais: $quantidade_nao_vogais</p>";

    // 4. Criar uma nova frase a partir da letra 'd' e exibir a frase de forma inversa
    $nova_frase = "d" . $frase; // Adiciona a letra 'd' no início da frase digitada
    $nova_frase_inversa = strrev($nova_frase);
    
    echo "<p>Nova frase com 'd' no início e invertida: $nova_frase_inversa</p>";
} else {
    echo "<p>Formulário não enviado corretamente.</p>";
}
?>