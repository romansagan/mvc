<?php
require_once ROOT . '/utils/Paginator.php';
require_once ROOT . '/utils/RequestUtils.php';

class Feedback
{
	const WAITING_STATUS = 1;
	const ANSWERED_STATUS = 2;
	const REJECTED_STATUS = 3;
	const PER_PAGE = 2;

	public static function createFeedback($username, $email, $type, $title, $text)
	{
		$now = date('Y-m-d H:i:s');
		$status = self::WAITING_STATUS;
		$sql = "INSERT INTO `feedbacks`(`username`, `email`, `type_id`, `title`, `text`, `status_id`, `created_at`) VALUES ('" . $username . "','" . $email . "',$type,'" . $title . "','" . $text . "',$status ,'" . $now . "')";

		return self::exequteRequest($sql);
	}

	public static function getFeedbackTypes()
	{
		$sql = 'SELECT * FROM feedback_types ORDER BY name';
		return self::exequteRequest($sql);
	}

	public static function changeStatusToAnswered($feedbackId)
	{
		$sql = 'update feedbacks set status_id=' . self::ANSWERED_STATUS . ' where id=' . $feedbackId;
		return self::exequteRequest($sql);
	}

	public static function changeStatusToRejected($feedbackId)
	{
		$sql = 'update feedbacks set status_id=' . self::REJECTED_STATUS . ' where id=' . $feedbackId;
		return self::exequteRequest($sql);
	}

	public static function getFeedbackStatuses()
	{
		$sql = 'SELECT * FROM feedback_statuses ORDER BY name';
		return self::exequteRequest($sql);
	}

	public static function getAll()
	{
		return self::getFeedbacksByFilter('', '');
	}

	public static function getById($id)
	{
		$sql = "SELECT f.id, f.username,f.email,f.title,f.text,f.status_id,t.name as type FROM feedbacks f INNER JOIN feedback_types t ON f.type_id = t.id where f.id= $id";
		return self::exequteRequest($sql);
	}

	public static function getFeedbacksByFilter($typeFilterValue, $statusFilterValue, $selectedPage = 1)
	{
		$sql = 'SELECT * FROM feedbacks ORDER BY created_at desc';
		if (!empty($typeFilterValue) && !empty($statusFilterValue)) {
			$sql = 'SELECT * FROM feedbacks where  type_id = ' . $typeFilterValue . ' and status_id = ' . $statusFilterValue . ' ORDER BY created_at desc';
		} elseif (!empty($statusFilterValue)) {
			$sql = 'SELECT * FROM feedbacks where status_id = ' . $statusFilterValue . ' ORDER BY created_at desc';
		} elseif (!empty($typeFilterValue)) {
			$sql = 'SELECT * FROM feedbacks where type_id = ' . $typeFilterValue . ' ORDER BY created_at desc';
		}

		$db = Db::getConnection();

		$paginator = new Paginator($db, $sql);
		$result = $paginator->getData(self::PER_PAGE, $selectedPage);
		$result->paginationHTML = $paginator->createLinks(3, 'pagination pagination-sm');
		return $result;
	}

	public static function exequteRequest($sql)
	{
		$db = Db::getConnection();
//		$result = $db->query($sql);
//		return $result;
		$result = $db->prepare($sql);
		$result->execute();
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$results = $result->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}
}
