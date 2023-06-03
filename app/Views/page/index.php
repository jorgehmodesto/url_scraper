<!DOCTYPE html>
<html lang="en">
    <?= $this->render('app_header') ?>
    <body>
        <header>

            <div class="menu">
                <ul>
                    <?= $this->render('logo') ?>
                    <li class="menu-item"><a href="<?php echo base_url() ?>">Home</a></li>
                    <li class="menu-item"><a class="selected" href="<?php echo route_to('scraper')?>" >URL Scraper</a></li>
                    <li class="menu-item"><a href="<?php echo route_to('logout')?>" >Logout</a></li>
                </ul>
            </div>

        </header>

        <section class="content">
            <h1 style="width: 100%!important; margin: 0!important; text-align: center">Google</h1>

            <a href="<?php echo route_to('scraper') ?>" class="btn btn-link">< Back</a>
            <div class="pages-table">
                <table id="processed_pages" class="display" style="width:100%">
                    <thead style="background-color: #f2f2f2">
                    <tr>
                        <th>Name</th>
                        <th>Link</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Home page</td>
                        <td><a href="https://www.google.com" target="_blank">www.google.com</a></td>
                    </tr>
                    <tr>
                        <td>This is a product</td>
                        <td><a href="https://www.google.com/products/1" target="_blank">www.google.com/products/1</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </body>
</html>
