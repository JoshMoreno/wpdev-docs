<?php
@require __DIR__ . '/vendor/autoload.php';

$data = include __DIR__.'/data.php';

$filesystem = new \WPDevDocs\FileSystem();

$filesystem->removeOldFiles();

foreach ($filesystem->getAllSourceFiles() as $file) {
	$content = $file->render($data);

	$filesystem->write($file->targetPath(), $content);
}