### Talla3 Workflow

* First, create a new branch.
* Make your fixes in that branch.
* Start your commit message with a relevant prefix like `fix:`, `upgrade:`, `update:`, etc.
* Push your changes and open a new pull request.
* Do **not** merge until you're 100% sure the code is correct **and** it has been reviewed.
* After merging, delete your branch.
* Keep the repository branches clean.

---

## Developer Code Structure

* We always use the **Service - Repository** pattern from now on.
* Ensure your code follows the **SOLID** principles.
* Do **not** write business logic in controllers — controllers should only handle request-routing and connections.

