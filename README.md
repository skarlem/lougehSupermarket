# lougehSupermarket
Instructions to setup the project -

1. Install XAMPP or LAMPP
2. Copy the supermarket folder to htdocs
3. Import the supermarket.sql file in the assets folder
4. Setup your prefered database connection in config.php file
5. Open link in any browser "localhost/supermarket"

# below is the file structure

assets
   |-- supermarket.sql
controller
   |-- manage_products.php
   |-- manage_supplier.php
   |-- sales_transactions.php

models
   |-- products_model.php
   |-- sales_model.php
   |-- supplier_model.php

template
   |-- includes
   |   |-- footer.php
   |   |-- header.php
   |   |-- navbar.php
   |   |-- sidebar.php
   |-- login.php
   |-- pos.php
   |-- products.php
   |-- sales.php
   |-- supplier.php

config.php
index.php
pos.php
products.php
README.md
response.php
sales.php
supplier.php
