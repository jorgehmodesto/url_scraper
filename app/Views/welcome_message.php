<!DOCTYPE html>
<html lang="en">
    <?= $this->render('app_header') ?>
    <body>
        <header>
            <div class="menu">
                <ul>
                    <?= $this->render('logo') ?></li>
                    <li class="menu-item"><a class="selected" href="<?php echo base_url() ?>">Home</a></li>
                    <li class="menu-item"><a href="<?php echo route_to('scraper')?>" >URL Scraper</a></li>
                    <li class="menu-item"><a href="<?php echo route_to('logout')?>" >Logout</a></li>
                </ul>
            </div>
        </header>

        <div class="further">
            <section>
                <h1>Koombea Tech Assessment</h1>
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><rect x="32" y="96" width="64" height="368" rx="16" ry="16" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></rect><line x1="112" y1="224" x2="240" y2="224" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><line x1="112" y1="400" x2="240" y2="400" style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></line><rect x="112" y="160" width="128" height="304" rx="16" ry="16" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></rect><rect x="256" y="48" width="96" height="416" rx="16" ry="16" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></rect><path d="M422.46,96.11l-40.4,4.25c-11.12,1.17-19.18,11.57-17.93,23.1l34.92,321.59c1.26,11.53,11.37,20,22.49,18.84l40.4-4.25c11.12-1.17,19.18-11.57,17.93-23.1L445,115C443.69,103.42,433.58,94.94,422.46,96.11Z" style="fill:none;stroke:#000;stroke-linejoin:round;stroke-width:32px"></path></svg>
                    URL Scraper
                </h2>
                    <p>
                        This is going to be a simple application, where a user can add a link to a web page and
                        the application will scrape all the information of that page and get a list of all of the
                        links in that page. You can check the code out in this <a href="https://github.com/jorgehmodesto/url_scraper" target="_blank" >github repository</a>. Enjoy! :)
                    </p>
                <h2>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><line x1="176" y1="48" x2="336" y2="48" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></line><line x1="118" y1="304" x2="394" y2="304" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></line><path d="M208,48v93.48a64.09,64.09,0,0,1-9.88,34.18L73.21,373.49C48.4,412.78,76.63,464,123.08,464H388.92c46.45,0,74.68-51.22,49.87-90.51L313.87,175.66A64.09,64.09,0,0,1,304,141.48V48" style="fill:none;stroke:#000;stroke-linecap:round;stroke-miterlimit:10;stroke-width:32px"></path></svg> Navigate
                </h2>
                <p>In the menu above, you can navigate to the URL Scraper fature, or you can simply click <a href="<?php echo route_to('scraper')?>">here!</a></p>
            </section>
        </div>
    </body>
</html>
