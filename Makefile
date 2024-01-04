docker-login:
	aws ecr get-login --no-include-email --region ap-southeast-1 | sh -