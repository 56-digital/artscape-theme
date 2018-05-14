<?php /* Template Name: Contact */
get_header();
?>

<section sm='pt2 pb1' class='c12 py4 bb1lg'>
  <?php 
    $intro = get_field('intro');
    $intro_title = $intro['title'];
    $intro_text = $intro['text'];    
  ?>

  <div class='c12 tac pb1'>
    <div class='mxa mw50 px2'>
      <h1><?php echo $intro_title; ?></h1>  
      <div sm='fsC' class='c12 fsB'>
        <?php echo $intro_text; ?>
      </div>
    </div>
  </div>
</section>

<section class='c12'>
  <div sm='px1' class='c12 mw70 mxa px2'>
    <div class='py3'>
      <h3 class='ttu c12 tac'>How to Contact Us</h3>
      <div class='c12 mw50 mxa px2 tac fsC'>
         Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service. 
      </div>
    </div>

    <div class='form py2'>
      <form>
        <div class='c12 x xw '>

          <div sm='c12 mb1' class='c6 fsC x xw xjb px1'>
            <section class='form-input c12'>
              <label>Subject</label>
              <select>
                <option disabled selected>Choose one</option>
                <option>This is a test</option>
              </select>
            </section>    

            <section class='form-input c6'>
              <label>Email Address</label>
              <input type='email' />
            </section>    

            <section class='form-input c6'>
              <label>Phone Number</label>
              <input />
            </section>    

            <section class='form-input c4'>
              <label>Country (CA Only)</label>
              <input />
            </section>    

            <section class='form-input c4'>
              <label>City</label>
              <input />
            </section>

            <section class='form-input c4'>
              <label>Province</label>
              <select>
                <option disabled selected></option>
                <option>Ontario</option>
                <option>Quebec</option>
                <option>New Brunswick</option>
              </select>
            </section>

            <section class='form-input c12'>
              <label>Full Name</label>
              <input />
            </section>

            <section class='form-input c12 mb0'>
              <label>Discipline</label>
              <select>
                <option disabled selected>Choose one</option>
                <option>This is a test</option>
                <option>This is a test</option>
                <option>This is a test</option>
              </select>
            </section>
          </div>

          <div sm='c12' class='c6 px1 fsC x xw xjb '>
            <section class='form-input c12 mb0 h100'>
              <label>Message</label>
              <textarea class=''></textarea>
            </section>
          </div>
        </div> 
  
        <div class='c12 tac py4'>
          <button class='btn dib btn-large btn-dark'>SUBMIT</button> 
        </div>
      </form>
    </div>
  </div>
</section>

<?php get_footer(); ?>
