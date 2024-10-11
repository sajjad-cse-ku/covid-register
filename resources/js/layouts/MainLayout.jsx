import FlashNotification from "@/components/FlashNotification";
import NavBarNested from "@/layouts/NavBarNested";
import Notifications from "@/layouts/Notifications";
import { Head,usePage } from "@inertiajs/react";
import { AppShell } from "@mantine/core";



export default function MainLayout({ children, title }) {
  const { flash } = usePage().props;
  return (
    <AppShell
      navbar={{ width: 300, breakpoint: "sm", collapsed: { mobile: false } }}
      padding="4rem"
    >
      <Head title={title} />

      <FlashNotification flash={flash} />

      <AppShell.Navbar>
        <NavBarNested></NavBarNested>
      </AppShell.Navbar>

      <AppShell.Main>{children}</AppShell.Main>
    </AppShell>
  );
}
