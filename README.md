# API Tech Pines

Esta é uma API para gerenciamento de álbuns e faixas, desenvolvida em Laravel. A API permite que os usuários visualizem, pesquisem, adicionem e excluam álbuns e suas respectivas faixas.

## Configuração Inicial do Projeto

### Pré-requisitos

- PHP >= 8.0
- Composer
- Laravel >= 9.x
- MySQL
- 

### Passos para Configuração

1. **Clone o repositório**

   git clone https://github.com/BrendonLina/api-techpines

2. **Crie um banco de dados no MySQL com o nome tech_pines.**  



3. **gere uma secret key php artisan key:generate**


4. **depois do banco criado use: php artisan migrate**  


5. **as edpoints da api são:** 


Listar álbuns: GET /api/albums

Pesquisar álbuns: GET /api/albums/search?search={nome_do_album}

Adicionar um novo álbum: POST /api/albums

Excluir um álbum: DELETE /api/albums/{album}

Adicionar uma nova faixa em um álbum: POST /api/albums/{albumId}/faixas

Excluir uma faixa: DELETE /api/faixas/{faixa}