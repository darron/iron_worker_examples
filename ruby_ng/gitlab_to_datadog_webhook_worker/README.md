# Gitlab and Datadog example

This example demonstrates starting a worker from a GitlabHQ webhook.

1. Setup your Iron.io credentials
2. Add your Datadog API credentials to a file `datadog.yml`:

    ```yaml
    datadog:
        api_key: "your_key_here"
    ```
3. `iron_worker upload gitlab_to_datadog`
4. Add the webhooks url to the web hooks page in a gitlab project.
5. Test it!
6. Check your datadog events board.

Give it a go!

NOTE: If this isn't enough detail for you, [take a look at this blog article](http://blog.froese.org/2015/02/04/connecting-gitlab-to-datadog-using-iron.io/) - it may help.
