<?php require('header.php'); ?>
    <div id="changelog" class="container oddziel">
        <div class="row odstep">
            <div class="col-md-12">
                <div class="changelog kafelek czerwony">
                    <p>Lista zmian:</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="dane-changelogu">
                    <?php $inwentarz->changelog(); ?>
                </div>
            </div>
        </div>
    </div>
    </acticle>
    <?php include_once('footer.php');?>
    </body>
    </html>

