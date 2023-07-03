<?PHP 
//Transformo los arrays asociativos que tenia guardados y los transformo en json

$productos = [
       
    [
        "id" => 1,
        "nombre" => "Caramel",
        "descripcion" => "Generosamente cubierto con caramelo cremoso y mantecoso.",
        "imagen" => "img/products/Caramel-Brownie-over.webp",
        "precio" => 20
    ],
    [
        "id" => 2,
        "nombre" => "Cinnamon Cocoa",
        "descripcion" => "Mezclado con canela y cubierto con crumble de nuez de cacao. Contiene nueces.",
        "imagen" => "img/products/chocolate-chip-Brownie-over.webp",
        "precio" => 25
    ],
    [
        "id" => 3,
        "nombre" => "Chocolate Chip",
        "descripcion" => "Sprinkled with melt-in-your-mouth Belgian chocolate chips.",
        "imagen" => "img/products/Cinnamon-Cocoa-Brownie-over.webp",
        "precio" => 25
    ],
    [
        "id" => 4,
        "nombre" => "Cream Cheese",
        "descripcion" => "Swirled with sweet and tangy cream cheese.",
        "imagen" => "img/products/cream-cheese-Brownie-over.webp",
        "precio" => 40
    ],
    [
        "id" => 5,
        "nombre" => "Espresso Nib",
        "descripcion" => "Infused with rich espresso and sprinkled with crushed cocoa nibs.",
        "imagen" => "img/products/espresso-nib-Brownie-over.webp",
        "precio" => 45
    ],
    [
        "id" => 6,
        "nombre" => "Mint Chocolate",
        "descripcion" => "Infused with peppermint and drizzled with dark chocolate icing.",
        "imagen" => "img/products/mint-chocolate-Brownie-over.webp",
        "precio" => 50
    ],
    [
        "id" => 7,
        "nombre" => "Original",
        "descripcion" => "Our classic recipe with Belgian dark chocolate.",
        "imagen" => "img/products/Original-Brownie-over.webp",
        "precio" => 20
    ],
    [
        "id" => 8,
        "nombre" => "Pecan",
        "descripcion" => "Topped with a satisfying layer of crunchy, chopped pecans. Contains nuts.",
        "imagen" => "img/products/Pecan-Brownie-over.webp",
        "precio" => 40
    ],
    [
        "id" => 9,
        "nombre" => "Raspberry Swirl",
        "descripcion" => "Twisted with sweet and tart raspberry puree.",
        "imagen" => "img/products/Raspberry-Swirl-Brownie-over.webp",
        "precio" => 45
    ],
    [
        "id" => 10,
        "nombre" => "Toffee Crunch",
        "descripcion" => "Embedded with crunchy chunks of golden, buttery toffee. Contains nuts.",
        "imagen" => "img/products/Toffee-Crunch-Brownie-over.webp",
        "precio" => 60
    ],
    [
        "id" => 11,
        "nombre" => "Walnut",
        "descripcion" => "Layered with crunchy premium-grade walnut pieces. Contains nuts.",
        "imagen" => "img/products/Walnut-Brownie-over.webp",
        "precio" => 60
    ],
    [
        "id" => 12,
        "nombre" => "White Chocolate",
        "descripcion" => "Frosted with a drizzle of decadent white chocolate.",
        "imagen" => "img/products/White-Chocolate-Brownie-over.webp",
        "precio" => 60
    ]

];

echo json_encode($productos);