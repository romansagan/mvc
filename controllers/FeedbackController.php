<?php
require_once ROOT . '/vendor/autoload.php';
require_once ROOT . '/models/Feedback.php';
require_once ROOT . '/utils/RequestUtils.php';
require_once ROOT . '/utils/MailSender.php';

class FeedbackController
{
	public static function actionShowFeedbackForm()
	{
		$feedbackTypes = Feedback::getFeedbackTypes();
		require_once ROOT . '/views/user/feedbackForm.php';
	}

	public static function actionShowAll()
	{
		$result = Feedback::getAll();
		$feedbacks = $result->data;
		$pagination = $result->paginationHTML;
		$feedbackStatuses = Feedback::getFeedbackStatuses();
		$feedbackTypes = Feedback::getFeedbackTypes();
		require_once ROOT . '/views/admin/feedbacksAdmin.php';
	}

	public function actionCreate()
	{
		$name = PostRequest::getPropertyFromRequest('username');
		$email = PostRequest::getPropertyFromRequest('email');
		$type = PostRequest::getPropertyFromRequest('type');
		$title = PostRequest::getPropertyFromRequest('title');
		$text = PostRequest::getPropertyFromRequest('text');

		Feedback::createFeedback($name, $email, $type, $title, $text);
		$this->actionShowThanksPage();
	}

	public function actionShowThanksPage()
	{
		require_once ROOT . '/views/user/thanksPage.php';

	}

	public function actionShowFeedbackDetail()
	{
		$feedbackId = PostRequest::getPropertyFromRequest('feedbackID');
		$res = Feedback::getById($feedbackId);
		$feedbackDetail = $res[0];
		require_once ROOT . '/views/admin/feedbackDetail.php';

	}

	public function actionGetFeedbacksByFilters()
	{
		$typeFilterValue = PostRequest::getPropertyFromRequest('typeFilter', '');
		$statusFilterValue = PostRequest::getPropertyFromRequest('statusFilter', '');
		$selectedPage = PostRequest::getPropertyFromRequest('selectedPage', 1);

		$result = Feedback::getFeedbacksByFilter($typeFilterValue, $statusFilterValue, $selectedPage);
		$feedbacks = $result->data;
		$pagination = $result->paginationHTML;
		require_once ROOT . '/views/admin/feedbacksByFilter.php';
	}

	public function actionGetAnswerForm()
	{
		$feedbackId = PostRequest::getPropertyFromRequest('feedbackId');
		$email = PostRequest::getPropertyFromRequest('email');
		require_once ROOT . '/views/admin/answerForm.php';
	}

	public function actionSendAnswer()
	{
		$feedbackId = PostRequest::getPropertyFromRequest('feedbackId');
		$email = PostRequest::getPropertyFromRequest('email');
		$message = PostRequest::getPropertyFromRequest('message');
		$subject = 'Responce from Vakoms';
		Feedback::changeStatusToAnswered($feedbackId);
		//send mail
		MailSender::sendMessage($email, $subject, $message);
		//redirect to main page
		self::actionShowAll();
	}

	public function actionRejectFeedback()
	{
		$feedbackId = PostRequest::getPropertyFromRequest('feedbackId');
		Feedback::changeStatusToRejected($feedbackId);
		//redirect to main page
		self::actionShowAll();
	}
}
