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
            <h1 style="text-align: center">Scrap links from URL</h1>

            <form class="row needs-validation" style="margin-top: 30px" id="frmScrape" action="javascript:scrape()">
                <div class="col-10">
                    <input type="text" class="form-control" id="page_url" name="page_url" placeholder="Add new page" required>
                    <div class="invalid-feedback">
                        Please, insert a valid URL.
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary mb-3" id="scrape_btn" style="width: 100%!important;">Scrape</button>
                    <button class="btn btn-primary hide" type="button" id="loading_btn" disabled style="width: 100%!important;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading
                    </button>
                </div>
            </form>

            <div class="pages-table">
                <table id="processed_pages" class="display" style="width:100%">
                    <thead style="background-color: #f2f2f2">
                        <tr>
                            <th>Name</th>
                            <th style="width:20%">Total links</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="<?php echo route_to('page/$1', 1); ?>">Google</a></td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td><a href="<?php echo route_to('page/$1', 2); ?>">Jorge Modesto</a></td>
                            <td>in progress</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </body>
</html>
