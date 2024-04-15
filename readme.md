---

# Estrutura da Tabela `ultimas_consultas`

A tabela `ultimas_consultas` é responsável por armazenar os acessos mais recentes à API-Covid-19.

```sql
CREATE TABLE `ultimas_consultas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(100) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

- `id`: Chave primária da tabela, auto incrementada para identificar exclusivamente cada registro.
- `pais`: Campo para armazenar o nome do país consultado.
- `data`: Campo para armazenar a data e hora do acesso à API.

---

Claro, vou criar o arquivo Markdown com as alterações necessárias no `main.php` e explicando como modificar as credenciais do banco de dados:

---

# Alterações no arquivo `main.php`

Lembre-se também de atualizar as credenciais do banco de dados. Aqui estão as alterações necessárias:

1. **Credenciais do Banco de Dados**: Substitua as credenciais do banco de dados pelas suas próprias. Altere as variáveis `$servername`, `$username`, `$password` e `$dbname` para corresponder às suas configurações de banco de dados.

Por exemplo:
```php
$servername = "localhost"; // Altere para o endereço do seu servidor MySQL
$username = "seu_usuario_mysql"; // Substitua pelo seu nome de usuário do MySQL
$password = "sua_senha_mysql"; // Substitua pela senha do seu usuário do MySQL
$dbname = "Covid19"; // Altere para o nome do seu banco de dados
```
---
