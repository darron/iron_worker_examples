from iron_worker import *

worker = IronWorker(token='XXXXXXXXXX', project_id='xxxxxxxxxxx')

payload = {'pagerduty': {'query':'pizza'}}

task = worker.postTask(name='PythonWorker101', payload=payload)
