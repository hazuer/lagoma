 <!--/.aside-->
<style>
    section #content
    {
        background: url('assets/images/back_scop.png') no-repeat center center;
    }
</style>
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
        <?php
        echo $breadcrumb;
        foreach($desc_mod_submod  as $rows):
        ?>
        <div class="m-b-md">
             <h3 class="text-dark"><?php echo $rows->modulo ?><br></h3>
             <h5><?php echo $rows->submodulo ?></h5>
        </div>
        <?php
        endforeach
        ?>

    </section>
  </section>
</section>