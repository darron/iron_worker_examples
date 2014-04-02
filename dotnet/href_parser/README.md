Building a Visual Studio project to run on IronWorker
-------------

<p align="center">
<img align="center" src="../../../master/images/vs_mono_iron_worker.png" alt="vs+mono+iron.io">
</p>

## Getting Started

### Building the project

1. Open/create sln in Visual Studio. Target framework must be 4.0 or less. Type of app must be console app.
2. Add or Remove References (There is HtmlAgilityPack in this project added from nuget).
3. Write new or change existing code.
4. Build project.
5. Copy dll-files and exe from bin directory to worker directory.

### Creating the worker

1. Be sure you've setup your Iron.io credentials, see main [README.md](https://github.com/iron-io/iron_worker_examples).
2. Add exe, dll-files and other files in .worker file. href_parser.exe, HtmlAgilityPack.dll, HtmlSnippet.txt - related to this project.
3. Run `iron_worker upload worker101` to upload the worker code package to IronWorker.
4. Queue up a task: From command line: `iron_worker queue MonoWorker101 --priority 2 --timeout 60`
5. Schedule a task: From command line: `iron_worker schedule MonoWorker101 --delay 5 --timeout 60 --start-at "12:30" --run-times 5 --run-every 70`