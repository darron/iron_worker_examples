# Worker 101

This covers most of the core concepts of using IronWorker including loading third party
dependencies.

First install the following dependencies:

    go get -u github.com/kurrik/twittergo
    go get -u github.com/kurrik/oauth1a

Then add a file called
`CREDENTIALS` in this project root.  The format of this file should be:

    <Twitter consumer key>
    <Twitter consumer secret>
    <Twitter access token>
    <Twitter access token secret>

Then build go package `go build worker101.go` under a 64-bit operating system

After that:

1. Be sure you've setup your Iron.io credentials, see main [README.md](https://github.com/iron-io/iron_worker_examples).
1. Run `iron_worker upload worker101` to upload the worker code package to IronWorker.
1. Queue up a task:
  1. From command line: `iron_worker queue worker101 --payload '{"query":"xbox"}'`
1. Look at [HUD](https://hud.iron.io) to view your tasks running, check logs, etc.

