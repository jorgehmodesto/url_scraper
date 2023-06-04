<!DOCTYPE html>
<html lang="en">
    <head>

        <?= $this->render('app_header') ?>

        <script type="text/javascript">

            function scrape() {
                $('#scrape_btn').fadeOut(0);
                $('#loading_btn').fadeIn(0);
            }

            function updateTablePagesData(pagesTable) {
                $.ajax({
                    url: '<?php echo route_to('scraped_pages'); ?>',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        pagesTable.clear().rows.add(response.data).draw();
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                    }
                });
            }

            $(document).ready(function() {
                var pagesTable = $('#table_pages').DataTable({
                    stripeClasses: ['striped'],
                });
                updateTablePagesData(pagesTable);
            })

        </script>
    </head>
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
                <table id="table_pages" class="display datatables" style="width:100%">
                    <thead style="background-color: #f2f2f2">
                        <tr>
                            <th>Name</th>
                            <th style="width:20%">Total links</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </section>
    </body>
</html>
