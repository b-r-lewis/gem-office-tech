<?php 

	/**
	 * Template Name: Contact
	 */

get_header(); ?>

<form id="contact-form" class="contact-form">
    <input type="text" name="form-type" id="form-type" value="contact" class="form-type">
    <div class="row">
      <div class="name-field">
        <label class="required"for="name">Name
          <input type="text" id="name" name="name" placeholder="Name" required>
          <small class="error">Contact name required.</small>
        </label>
      </div>
    </div>
    <div class="row">
        <label class="required"for="company">Company
          <input type="text" id="company" name="company" placeholder="Company" required>
          <small class="error">Company name required.</small>
        </label>
    </div>
    <div class="row">
        <label class="required" for="phone">Phone Number
          <input type="tel" id="phone" name="phone" placeholder="(555) 555-5555" required>
          <small class="error">Valid phone number required.</small>
        </label>
    </div>
    <div class="row">
        <label class="required" for="email">Email
          <input type="email" id="email" name="email" placeholder="name@company.com" pattern="email" required>
          <small class="error">Valid email required.</small>
        </label>
    </div>
    <div class="row">
        <label for="subject">Subject
          <input type="text" id="subject" name="subject" placeholder="Subject">
        </label>
      </div>
    <div class="row">
        <label class="required" for="message">Message
          <textarea id="message" name="message" placeholder="Message" rows=6 required></textarea>
          <small class="error">Message required.</small>
        </label>
    </div>
    <div class="row">
        <button type="submit" class="medium button">Send</button>
    </div>
</form>

<?php get_footer();