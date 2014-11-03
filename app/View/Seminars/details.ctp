<?php
	// このページ限定のCSS,JS
	$this->Html->script(array(
		'imgopt',
		'SeminarsDetails',
		), array('inline' => false));
	$this->Html->css(array(
		'seminars',
		), null, array('inline' => false));
?>

<script>
	$(window).load(function () {
		ImgOpt.setImgId('.optim');
		ImgOpt.optimize();
	});
</script>


<h2><img src="<?php echo IMG_PATH; ?>seminar_h.png" alt="勉強会作成確認" width="306" height="109"><span class="hidden">勉強会詳細</span></h2>
<section id="newSmnConfirm">
	<div class="wrapper">
		<?php
			if (!empty($seminar['Seminar']['seminar_image_id'])) {
		?>
			<div id="coverArea">
						<?php echo '<img src="' . SMN_IMG_PATH . $seminar['Seminar']['seminar_image_id'] . $seminar['SeminarImage']['ext'] . '" alt="">'; ?>
			</div>
		<?php } ?>
		<h3><?php echo $seminar['Seminar']['name'] ?></h3>
		<div class="cf">
			<article>
			<h4>詳細</h4>
				<?php echo $seminar['Seminar']['description'] ?>
			</article>
			<aside>
			<h4>開催情報</h4>
			<div>
				<dl>
					<dt>開催日時</dt>
					<dd><?php
						list($startDate, $startTime) = explode(' ', $seminar['Seminar']['start']);
						list($date, $month, $day) = explode('-', $startDate);
						list($startH, $startM) = explode(':', $startTime);
						$endTime = explode(' ', $seminar['Seminar']['end'])[1];
						list($endH, $endM) = explode(':', $endTime);
						echo $date . '年' . $month . '月' . $day . '日<br />' . sprintf('%02d', $startH) . ':' . sprintf('%02d', $startM) . '〜' . sprintf('%02d', $endH) . ':' . sprintf('%02d', $endM);
					?></dd>
					<dt>開催場所</dt>
					<dd><?php echo $seminar['Seminar']['place'] ?></dd>
					</dd>
					<dt>募集人数</dt>
					<dd>
						<?php echo +$seminar['Seminar']['upper_limit'] === 0 ? '制限なし' : $seminar['Seminar']['upper_limit'] . '人まで'; ?>
					</dd>
					<dt>予約締切日時</dt>
					<dd>
					<?php
						list($limitDate, $limitTime) = explode(' ', $seminar['Seminar']['reservation_limit']);
						list($limitDate, $limitMonth, $limitDay) = explode('-', $limitDate);
						list($limitH, $limitM) = explode(':', $limitTime);
						echo $limitDate . '年' . $limitMonth . '月' . $limitDay . '日<br />' . sprintf('%02d', $limitH) . '時' . sprintf('%02d', $limitM) . '分';
					?>
					</dd>
					<dt>主催者</dt>
					<dd>
						<p><?php echo $seminar['Account']['last_name'] . ' ' . $seminar['Account']['first_name'] ?></p>
						<div class="profImg">
						<?php
							if (!empty($seminar['Account']['img_ext'])) {
								echo $this->HTML->image('profile/' . $seminar['Account']['id'] . '.' . $seminar['Account']['img_ext'], array('class' => 'optim'));
							} else {
								echo $this->HTML->image(PROF_IMG_PATH . 'no_image.gif', array('class' => 'optim'));
							}
						?>
						</div>
					</dd>
				</dl>
				<!-- 参加ボタン or 参加取り消しボタン or 編集ボタン -->
				<?php echo $this->Form->create('Button'); ?>
				<?php

				switch ($userType) {
					case 'NoJoin':
						echo $this->Html->link($this->HTML->image('participates_btn.png', array('width' => '222', 'height' => '54')), array('action' => 'register'), array('escape' => false, 'class' => 'btnSubmitJoinCancelEdit'));
						echo $this->Form->input('join', array('type' => 'hidden', 'value' => 'join'));
						break;

					case 'Join':
						echo $this->Html->link($this->HTML->image('cancel_btn.png', array('width' => '138', 'height' => '54')), array('action' => 'register'), array('escape' => false, 'class' => 'btnSubmitJoinCancelEdit'));
						echo $this->Form->input('cancel', array('type' => 'hidden', 'value' => 'cancel'));
						break;

					case 'Manager':
						echo '<a href="' . ROOT_URL . 'Seminars/edit/' . $smnID . '">' . $this->HTML->image('thisseminarediting_btn.png', array('width' => '222', 'height' => '54')) . '</a>';
						break;

					default:
						exit('エラー');
						break;
				}

				?>
				<?php echo $this->Form->end(); ?>
			</div>
			</aside>
		</div>
	</div>
</section>


<h2><img src="<?php echo IMG_PATH; ?>seminarq_h.png" alt="セミナーに対する質問" width="306" height="109"><span class="hidden">セミナーに対する質問</span></h2>
<section id="seminarQ">
	<div class="wrapper">
		<?php if(count($seminar['Question']) === 0): ?>
			<p><?php echo 'この勉強会に対する質問はありません'; ?></p>
		<?php endif; ?>
		<ul>
		<?php foreach($seminar['Question'] as $question): ?>
			<li>Q. <?php echo $this->Html->link($question['title'], array(
				'controller' => 'Questions' ,
			 	'action' => 'index',
			 	'?' => array('id' => $question['id'])
			 	)); ?><span><?php echo str_replace('-', '/', $question['timestamp']); ?></span></li>
		<?php endforeach; ?>
		</ul>
	</div>
</section>


<?php if($userType !== 'Manager'): ?>
	<?php echo $this->Form->create('Question'); ?>
	<div>
		<p><b>質問投稿フォーム</b></p>
		<p>質問タイトル</p>
		<p><?php echo $this->Form->text('title'); ?></p>
		<p class="errMsg"><?php echo $eTitle ?></p>
		<p>内容</p>
		<p><?php echo $this->Form->textarea('content'); ?></p>
		<p class="errMsg"><?php echo $eContent ?></p>
		<?php echo $this->Form->submit('質問を投稿する', array(
			'name' => 'question')); ?>
	</div>
	<?php echo $this->Form->end(); ?>
<?php endif; ?>