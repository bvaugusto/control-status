1. Criação da Model utilizando boas práticas de Laravel, ou seja;

   O uso de relações
   
   Mass assignments
   
   Mutators
   
   Escopos
   
   Separação de responsabilidades

2. A migration da tabela 

3. A criação da Controller assim como as rotas necessárias para seu funcionamento. 

4. A validação para que as regras explicitadas na documentação sejam respeitadas.

5. Interface para realização de cada ação detalhada na documentação 

6. A criação de ao menos os seguintes testes:
   a. Testar cada um dos métodos do controller
   b. Testar ao menos 3 regras de validação

Ações:
Listagem,
criação,
edição,
deleção (soft-delete)

Company


## CNPJ

• Obrigatório 

• Único 
. API https://receitaws.com.br/api
. O usuário poderá sobrescrever os dados caso deseje.

• String 

• 14 caracteres 

• Deve permitir apenas números ao salvar 

• Deve possuir máscara para o usuário

• Deve validar através do digito verificador


## Razão Social

• Obrigatório 

• String 


## Nome Fantasia

• String 


## Inscrição Municipal

• Texto 

• Obrigatório 


## Inscrição Estadual

• Texto 

• Opcional no caso de empresas do segmento de serviços **\*\*\***
. Validar no cliente

## Address

## CEP

• Obrigatório 

• 8 caracteres apenas numéricos 
. API https://viacep.com.br/
. O usuário poderá sobrescrever os dados caso deseje.


## Logradouro

• Texto 

• Obrigatório 


## Número

• Obrigatório 

• Texto 


## Telefone

• Obrigatório 

• Texto 

• 10 ou 11 caracteres 

• Deve ser um telefone válido (cliente / servidor)


## E-mail

• Obrigatório 

• Deve ser um e-mail válido (cliente / servidor)


## Complemento

• Texto 

• Opcional 


## Bairro

• Obrigatório 

• Texto 


## Cidade

• Obrigatório 

• Texto 


## Estado

• Obrigatório 

• 2 caracteres 

• Lista de estados (UF) (método cliente / servidor)


## Segmento

> Lista de opções

• Produto 

• Serviço 

• Produto e Serviço 

• Obrigatório 

## Bootstrap

-- Back-end

-- composer install && composer update && composer dump

-- php artisan migrate

-- php artisan db:seed --class=SegmentSeeder

-- Dabatase PostgreSQL
