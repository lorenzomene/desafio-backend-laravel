# Desafio Picpay Simplificado
## https://github.com/PicPay/picpay-desafio-backend
## Database
* Users
	* id: uuid primary
	* document_type: string -> enum no codigo
	* document: string -> cpf/cnpj -> unique com document type
	* email: string -> unique
	* name: string
	* index (document_type, document) -> facilitar buscar
* -> podem ser customer ou shopkeeper

* Wallets
	* id: uuid primary
	* user_id: uuid fk user
	* balance: int -> usar os valores como centavos -> R$1.00 -> 100

* Transactions
	* id: uuid primary
	* value: int
	* payer_id: uuid fk wallet
	* payee_id: uuid fk wallet
	* status: string -> sera uma enum no codigo

## notas

valores como int para evitar problemas de arredondamento

