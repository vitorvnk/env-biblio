<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Há um livro pendente na Biblioteca Virtual</title>
</head>
<body>
<h1>Biblioteca Virtual</h1>

<p>Olá meu querido, estamos entrando em contato para informá-lo que esse livro está pendente em nossa base:</p>

<ul>
    <li><strong>Título:</strong> {{ $book['name'] }}</li>
    <li><strong>Autor:</strong> {{ $book['author'] }}</li>
</ul>

<p>Necessário devolução.</p>

<p>Obrigado</p>
</body>
</html>
