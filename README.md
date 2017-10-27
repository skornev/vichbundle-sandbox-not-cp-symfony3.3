# vichbundle-sandbox-not-cp-symfony3.3
VichBundle not compatible with symonfy 3.3 

`
CREATE USER 'vich'@'%' IDENTIFIED BY 'vich';
CREATE DATABASE vich;
GRANT ALL PRIVILEGES ON vich.* TO 'vich'@'%' ;
FLUSH PRIVILEGES;
`

Uncomment the following lines in InvoiceAttachmentType to make it work

`
//            ->add('originalName', HiddenType::class, [
//                'required' => false
//            ])
`