<?php
require '../core/functions.php';
require '../core/processContactForm.php';
$meta=[];
$meta['title']='Resume Daffanie';
$meta['Description']='Resume Daffanie';

$content = <<<EOT
  {$message}
<main>
  <section class="resume-heading">
  <br><br><br>
    <h1>Daffanie Hurley</h1>
    <h4>Chicago, Illinois 60620 <br> 773-891-2094 <br> daffhur50@gmail.com</h4>

  </section>

  <section class="sub-headings">
    <h3>Full Stack Web and Hybrid Mobile Applications Developer</h3>
    <p class="first">Full stack web and hybrid mobile applications developer specializing in full stack
      JavaScript application and architectures. Experienced in all stages of the development life cycle, well versed in numerous
      programming languages.</p>
    <ul>
      <li>Hands-on experience leading all stages of system development efforts, including requirements in
          definition design, architecture, testing and support.</li>

      <li>Outstanding leadership abilities; able to coordinate and direct all phases of project-based
          efforts.</li>
    </ul>
  </section>

  <section class="core-head">
    <h3><em>Core Competencies</em></h3>
      <table>
        <ul>
          <tr>
          <td>
            <li>Full Stack Development</li>
          </td>
          <td>
            <li>Hybrid Mobile Development</li>
          </td>
          </tr>

          <tr>
          <td>
            <li>Strong Analytical Skills</li>
          </td>
          <td>
            <li>Savvy Problem Solver</li>
          </td>
          </tr>

          <tr>
          <td>
            <li>Prioritizes Tasks</li>
          </td>
          <td>
            <li>Strong Leadership Skills</li>
          </td>
          </tr>
        </ul>

      </table>
  </section>

  <section>

    <h4 class="section-three">CERTIFICATIONS / TECHNICAL PROFICIENCIES</h4>
      <table class="second-table">
        <tr>
          <td>Certifications:</td>
          <td>Agile Certified Scrum Master</td>
        </tr>

        <tr>
          <td>Platforms:</td>
          <td>Linux, Windows, Mac, LAMP, MEAN, NodeJS</td>
        </tr>

        <tr>
          <td>Database:</td>
          <td>MySQL, MongoDB</td>
        </tr>

                <tr>
                    <td>Tools:</td>
                    <td>VS Code, SSH, Gulp, Git</td>
                </tr>

                <tr>
                    <td>Languages:</td>
                    <td>HTML, CSS, SASS, JavaScript, ES6, PHP, Bash, SQL</td>
                </tr>
            </table>

  </section>

  <section>
            <h4 class="section-three">PROFESSIONAL EXPERIENCE</h4>

            <h4 class="clearfix">
                <span class="float-left">Bob’s Custom Websites - Chicago, IL</span>
                <span class="float-right">2015 - Present</span></h4>
            <p class="bob">Bob's Custom Websites builds custom web applications for clients across a large number of
                industries.</p>

            <h4>Web Developer</h4>

            <ul class="bullet-four">
                <li>Work with ES6, NodeJS, HTML, JavaScript, CSS, MySQL and MongoDB to build customized
                    web applications for a diverse set of customers.</li>
                <li>Designed the application to meet the users’ requirements document.</li>
                <li>Ensured corporate and department objectives were accomplished in accordance with outlined
                    objectives and mission statements.</li>
            </ul>

            <h4><em>Key Contributions:</em></h4>

            <ul class="bullet-four">
                <li>Developed and implemented procedures and guidelines, optimizing productivity and efficiency;
                    generating significant cost savings.</li>
                <li>Recognized for the development of excellent business relationships, providing exemplary customer
                    service.</li>
            </ul>
  </section>

  <section class="section-ed">
    <h2>EDUCATION</h2>
    <h3 class="clearfix">
                Devry University - Chicgo, IL
                <span class="float-righted">2011 - 2015</span><br>
                <P><strong>Bachelor of Science in Computer Information Systems</strong></p><br>
                <span class="float-lefted">MicroTrain Technologies – Chicago, IL </span>
                <span class="float-righted">2015</span><br>
                <p><strong>Agile Full Stack Web and Hybrid Mobile Application Development</strong></p>
  </section>

</main>

EOT;

require '../core/layout.php';


