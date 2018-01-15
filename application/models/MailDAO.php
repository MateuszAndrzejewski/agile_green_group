<?php

class MailDAO extends CI_Model
{
	public function get($submission)
	{
		$recipient = $this->getRecipient($submission->ref_user);
		$senderUsername = $this->getSenderUsername();
		$recipientUsername = $recipient->firstname." ".$recipient->lastname;
		$jobOffer = $this->getJobOffer($submission->ref_job_offer);
		
		$subject = 'Evaluation';
		$message = 'Dear '.$recipientUsername.','.'%0D%0A%0D%0A'.'Your submission for the position: '.$jobOffer->position.' has been graded.%0D%0AYour score: '.$submission->grade.'.%0D%0A%0D%0A'.'With regards,'.'%0D%0A'.$senderUsername;
		
		$mail = array(
			'to' => $recipient->email,
			'subject' => $subject,
			'message' => $message
		);
		
		return $mail;
	}
	
	private function getRecipient($user_id)
	{
		$this->db->select('*');
		$this->db->where('id', $user_id);
		$query = $this->db->get('user');

		$user = $query->row();

		return $user;
	}
	
	private function getJobOffer($job_id)
	{
		$this->db->select('*');
		$this->db->where('id', $job_id);
		$query = $this->db->get('job_offer');
		
		$job = $query->row();
		
		return $job;
	}
	
	private function getSenderUsername()
	{
		$firstname = $this->session->firstname;
		$lastname = $this->session->lastname;
		return $firstname." ".$lastname;
	}
}