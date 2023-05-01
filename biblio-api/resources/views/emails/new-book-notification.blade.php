<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Novo livro adicionado à Biblioteca Virtual</title>
</head>
<body>
<h1>Biblioteca Virtual</h1>

<p>Olá meu querido, estamos entrando em contato para informá-lo que um novo livro foi adicionado à nossa base:</p>

<ul>
    <li><strong>Título:</strong> {{ $book['name'] }}</li>
    <li><strong>Autor:</strong> {{ $book['author'] }}</li>
</ul>

<p>Venha conferir.</p>

<p>Obrigado</p>
</body>
</html>
