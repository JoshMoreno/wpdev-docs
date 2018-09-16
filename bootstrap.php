<?php
@require __DIR__ . '/vendor/autoload.php';

$data = include __DIR__.'/data.php';

$filesystem = new \WPDevDocs\FileSystem();

foreach ($filesystem->getAllSourceFiles() as $file) {
	$content = $file->render($data);

	if ($file->hasChanged($content)) {
		$filesystem->write($file->targetPath(), $content);
	}
}