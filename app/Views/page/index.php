<!DOCTYPE html>
<html lang="en">
    <head>

        <?= $this->render('app_header') ?>

        <script type="text/javascript">

            function scrape() {
                $('#scrape_btn').fadeOut(0);
                $('#loading_btn').fadeIn(0);
            }

            function updateLinkPagesData(linksTable) {
                $.ajax({
                    url: '<?php echo route_to('page/links/$1', $page_id); ?>',
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        linksTable.clear().rows.add(response.data).draw();
                    },
                    error: function(xhr, status, error) {
                        console.log('Error:', error);
                    }
                });
            }

            $(document).ready(function() {
                var linksTable = $('#links_table').DataTable({
                    stripeClasses: ['striped'],
                });
                updateLinkPagesData(linksTable);
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
            <h1 style="width: 100%!important; margin: 0!important; text-align: center">Google</h1>

            <a href="<?php echo route_to('scraper') ?>" class="btn btn-link">< Back</a>
            <div class="pages-table">
                <table id="links_table" class="display datatables" style="width:100%">
                    <thead style="background-color: #f2f2f2">
                    <tr>
                        <th>Name</th>
                        <th>Link</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </section>
    </body>
</html>
