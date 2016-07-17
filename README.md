# integritycheck

This repo provides some interfaces to build integrity checks for your application.

Integrity checks are somewhere between integration tests (that should ensure the 
correct functionality of your app) and monitoring (that should ensure the availability 
of your app).

They consist of an `investigation` that can detect some invalid state (usually of dsata),
and a `resolution` that can resolve the situation. There are three types of resolution:

- Automatic: this solves the detected problem by running queries, code or anything else.
- Manual: maybe the resolution is dangerous or impossible to deduce, this is a description 
of how to resolve the detected situation.
- NotImplemented: this allows checks to be built without knowing the resolutions but still
keeping track of which integrity checks still need more work.


An example of an integrity check could be:

- Investigation: query a datastore for articles with a "published" state where "publishUntil" is in the past

Examples of resolutions could be:

- AutomaticResolution: unpublish the articles in question
- ManualResolution: call Anton from the news division on 1234 and ask which articles need to be de-published

Obviously you would also want to check your de-publication cronjobs in such a case.
